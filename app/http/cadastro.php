<?php
      //obtem dados da solicitação de post e armazena em variaveis
      $username = $_POST['username'];
      $nome = $_POST['nome'];
      $senha = $_POST['senha'];
      //conexão com banco de dados
      include "./app/http/config.php";
      //faz formato de dados URL
      $data = 'name='.$nome.'username='.$username;
        //verifica se o username, nome e senha do usuário foi enviado
        if(isset($_POST['username']) &&
        isset($_POST['nome']) &&
        isset($_POST['senha'])){
            if(empty($nome)){
                //mensagem de erro
                $erro = "Nome é obrigatório";
                //redirecionar para 'inscreva-se.php' e passar mensagem de erro
                header("Location: ../../cadastro.php?error=$erro");
                exit;
                } else if(empty($username)){
                $erro = "Userame é obrigatório";
                header("Location: ../../cadastro.php?error=$erro");
                exit;
                } else if(empty($senha)){
                $erro = "Senha é obrigatório";
                header("Location: ../../cadastro.php?error=$erro&$data");
                exit;
                } else{
                header("Location: ../../cadastro.php");
            }
        }
