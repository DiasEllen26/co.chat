<?php

session_start();

if (isset($_SESSION['username'])) {

    if (
        isset($_POST['menssagem']) &&
        isset($_POST['de_id'])
    ) {

        include '../http/config.php';

        $menssagem = $_POST['menssagem'];
        $de_id = $_POST['de_id'];

        
        $para_id = $_SESSION['id'];

        $sql = "INSERT INTO 
	       chat (para_id, de_id, menssagem) 
	       VALUES (?, ?, ?)";
        $dados = $con->prepare($sql);
        $resposta  = $dados->execute([$para_id, $de_id, $menssagem]);

      
        if ($resposta) {
    
            $sql = "SELECT * FROM conversa
               WHERE (usuario_1=? AND usuario_2=?)
               OR    (usuario_2=? AND usuario_1=?)";
            $dados = $con->prepare($sql);
            $dados->execute([$para_id, $de_id, $para_id, $de_id]);

        
            define('TIMEZONE', 'America/Sao_Paulo');
            date_default_timezone_set(TIMEZONE);

            $time = date("h:i:s a");

            if ($dados->rowCount() == 0) {
             
                $sql = "INSERT INTO 
			         conversa(usuario_1, usuario_2)
			         VALUES (?,?)";
                $dados = $con->prepare($sql);
                $dados->execute([$para_id, $de_id]);
            }
?>

            <p class="rtext align-self-end
		          border rounded p-2 mb-1">
                <?= $menssagem ?>
                <small class="d-block"><?= $time ?></small>
            </p>

<?php
        }
    }
} else {
    header("Location: ../../index.php");
    exit;
}
