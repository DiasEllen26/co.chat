<?php
session_start();
if (!isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>co.chat</title>
        <link rel="stylesheet" href="./css/style.css">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    </head>
        <body class="chat d-flex justify-content-center align-items-center"> 
        <div class="w-300 p-3 m-3 rounded"> 
            <form method="post" action="app/http/cadastro.php" enctype="multipart/form-data" class="form">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <img src="./imagens/logo.png" alt="chat.io" class="logo rounded-circle">    
                    </div>
                    <h3 class="display-4 fs-1 text-center">Cadastre-se</h3>
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-warning" role="alert">
                            <?php echo htmlspecialchars($_GET['error']); ?>
                        </div>
                    <?php }
                    if (isset($_GET['nome'])) {
                        $nome = $_GET['nome'];
                    } else {
                        $nome = "";
                    }
                    if (isset($_GET['username'])) {
                        $username = $_GET['username'];
                    } else {
                        $username = "";
                    }
                    if (isset($_GET['senha'])) {
                        $senha = $_GET['senha'];
                    } else {
                        $senha = "";
                    }
                    ?>
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?= $nome ?>">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $username ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" class="form-control" name="senha" value="<?= $senha ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Avatar</label>
                            <input type="file" class="form-control" name="avatar">
                        </div>
                        <button type="submit" class="btn btn-primary">Inscrever</button>
                        <a href="index.php">Entrar</a>
                    </div>
                </div>
            </form> 

        <script src="./js/script.js"></script>
        <!-- Scripts Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
        </body>

    </html>
<?php
} else {
    header("Location: ./home.php");
    exit;
}
?>