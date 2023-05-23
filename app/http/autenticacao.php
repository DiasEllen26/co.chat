<?php
session_start();

    if (isset($_POST['username']) &&
        isset($_POST['senha'])) {
        //conexão com banco de dados
        include 'config.php';
        $username = $_POST['username'];
        $senha = $_POST['senha'];

        if(empty($username)){
            $erro = "Username é necessário";
            header("Location: ../../index.php?error=$erro");
        }else if(empty($senha)){
            $erro = "Senha é necessário";
            header("Location: ../../index.php?error=$erro");
        } else {
            $sql = "SELECT * FROM users where username=?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$username]);
            //se o username existe
            if ($stmt->rowCount() === 1){
                //buscando dados do usuário
                $usuario = $stmt->fetch();

                //se ambos os nomes de usuário são estritamente iguais
                if ($usuario['username' === $username]) {

                    //verificando a senha criptografada
                    if (password_verify($senha, $usuario['senha'])){
                        $_SESSION['username'] = $usuario['username'];
                        $_SESSION['nome'] = $usuario['nome'];
                        $_SESSION['id'] = $usuario['id'];

                        //redirecionando para 'home.php';
                        header("Location: ../../home.php");
                    }else{
                        $erro = "Incorreto username ou senha";
                        header("Location: ../../index.php?error=$erro");
                        }
                    }
                 }else{
                        $erro = "Incorreto username ou senha";
                        header("Location: ../../index.php?error=$erro");
            }
        }
    } else {
        header("Location: ../../index.php");
        exit;
    }