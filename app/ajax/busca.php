<?php
session_start();

if (isset($_SESSION['username'])) {
    if (isset($_POST['corpo'])) {
        include '../http/config.php';

        $chave = "%{$_POST['corpo']}%";

        $sql = "SELECT id, nome,username , avatar, visto FROM users WHERE username LIKE ? OR nome LIKE ?";

        $dados = $con->prepare($sql);
        $dados->execute([$chave, $chave]);

        if ($dados->rowCount() > 0) {
            $usuarios = $dados->fetchAll();

            foreach ($usuarios as $user) {
                if ($user['id'] == $_SESSION['id']) continue;
?>
                <li class="list-group-item">
                    <a href="chat.php?user=<?= $user['username'] ?>" class="d-flex justify-content-betweenalign-items-center p-3">
                        <div class="d-flex
                           align-items-center">

                            <img src="uploads/<?= $user['avatar'] ?>" class="w-25 rounded-circle">

                            <h3 class="fs-xs m-2">
                                <?= $user['nome'] ?>
                            </h3>
                        </div>
                    </a>
                </li>
            <?php }
        } else {
            ?>
            <div class="alert alert-info 
    				 text-center">
                <i class="fa fa-user-times d-block fs-big"></i>
                O usuario "<?= htmlspecialchars($_POST['corpo']) ?>"
                não foi encontrado.
            </div>
<?php
        }
    }
} else {
    header("Location: ../../index.php");
    exit;
}
