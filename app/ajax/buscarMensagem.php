<?php

session_start();

if (isset($_SESSION['username'])) {

    if (isset($_POST['id_2'])) {

        include '../http/config.php';

        $id_1  = $_SESSION['id'];
        $id_2  = $_POST['id_2'];
        $aberto = 0;

        $sql = "SELECT * FROM chat
	        WHERE de_id=?
	        AND   para_id= ?
	        ORDER BY id ASC";
        $dados = $con->prepare($sql);
        $dados->execute([$id_1, $id_2]);

        if ($dados->rowCount() > 0) {
            $chats = $dados->fetchAll();

            foreach ($chats as $chat) {
                if ($chat['aberto'] == 0) {

                    $aberto = 1;
                    $chat_id = $chat['id'];

                    $sql = "UPDATE chat
	    		         SET aberto = ?
	    		         WHERE id = ?";
                    $dados = $con->prepare($sql);
                    $dados->execute([$aberto, $chat_id]);

?>
                    <p class="ltext border 
					        rounded p-2 mb-1">
                        <?= $chat['menssagem'] ?>
                        <small class="d-block">
                            <?= $chat['criado_em'] ?>
                        </small>
                    </p>
<?php
                }
            }
        }
    }
} else {
    header("Location: ../../index.php");
    exit;
}
