<?php
    //verifica se o username, nome e senha do usuário foi enviado
    if(isset($_POST['username']) &&
        isset($_POST['nome']) &&
        isset($_POST['senha'])){
            //obtem dados da solicitação de post e armazena em variaveis
            $username = $_POST['username'];
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            //faz formato de dados URL
            $data = 'nome='.$nome.'%username='.$username;
            //validação simples
            if(empty($username)){
               //mensagem de erro
                $erro = "Username é obrigatório";
                //redirecionar para 'inscreva-se.php' e passar mensagem de erro
                header("Location: ../../inscreva-se.php?error=$erro");
                exit;
                } else if(empty($nome)){
                $erro = "Nome é obrigatório";
                header("Location: ../../inscreva-se.php?error=$erro");
                exit;
                } else if(empty($senha)){
                $erro = "Senha é obrigatório";
                header("Location: ../../inscreva-se.php?error=$erro");
                exit;
                } else{
                echo "good";
                }
            } else {
                header("Location: ../../inscreva-se.php?error=$erro");
                exit;
            }