<?php
    session_start();
    if(!isset($_SESSION['username'])) {
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
<body class="chat d-flex justify-content-center align-items-center"> 
        <div class="w-300 p-3 m-3 rounded"> 
            <form method="post" action="app/http/autenticacao.php" class="form">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <img src="./imagens/logo.png" alt="chat.io" class="logo rounded-circle">    
                    </div>
                    <?php if (isset($_GET['error'])) { ?>    
                        <div class="alert alert-warning" role="alert">
                              <?php echo htmlspecialchars($_GET['error']); ?>
                            </div>
                            <?php } 
                                if (isset($_GET['success'])){ ?> 
                                <div class="alert alert-success" role="alert">
                                    <?php echo htmlspecialchars($_GET['success']);?>
                                </div>
                                <?php }?>

                        <div class="mb-3">    
                            <label class="form-label">Login</label>
                                <input type="text" class="form-control" placeholder="Insira seu login" name="username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" class="form-control" name="senha" placeholder="Insira sua senha">
                        </div>
                        <button type="submit" class="btn1 btn-primary">Entre</button>
                        <a href="cadastro.php" type="submit">Cadastre-se</a>
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
    }else{
        header("Location: ./home.php");
        exit;
    }
?>
