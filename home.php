<?php
    session_start();
    if(isset($_SESSION['username'])) {
        //conexão com banco de dados
        include './app/http/config.php';
        include './app/ajudantes/usuario.php';
        include './app/ajudantes/conversa.php';
        $usuario = getUser($_SESSION['username'], $con);
 
        $conversa = getConversa($usuario['id'], $con);
        print_r($conversa);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>co.chat</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="p-2 w-400 rounded shadow">

        <div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="./uploads/<?=$username['avatar']?>" class="w-2 rounded-circle">
                <h3 class="fs-xs m-2"><?=$username['nome']?></h3>            
            </div>
            <a href="./sair.php" class="btn btn-dark">Sair</a>
        </div>

        <div class="input-group mb-3">
            <input type="text" placeholder="Procurar..." class="form-control">
            <button class="btn btn-primary">
                <i class="fa fa-search"></i>
            </button>
        </div>
        <ul class="list-group mvh-50 overflow-auto">
            <li class="list-group-item">
                <a href="./chat.php" class="d-flex justify-content-center align-items-center p-2">
                    <div class="d-flex align-items-center">
                        <img src="./uploads/userdefault.png" class="v-10 rounded">
                        <h3 class="fs-xs m-2">Nome</h3>
                    </div>
                </a>
            </li>
        </ul>
    </div>
        


</body>
</html>

<?php
    }else{
        header("Location: ./index.php");
        exit;
    }
?>