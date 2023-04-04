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
                }
                {
                    $sql = "SELECT username FROM users WHERE username=?";
                    $stmt = $con->prepare($sql);
                    $stmt->execute([$username]);

                    if ($stmt->rowCount() > 0) {
                        $erro = "O username ($username) está indisponível";
                        header("Locattion: ../../cadastro.php?error=$erro&$data");
                        exit;
                    } else {
                        // foto de perfil carregada
                        if (isset($_FILES['avatar'])) {
                            // obter dados e armazenando em variavel 
                            $img_nome = $_FILES['avatar']['nome'];
                            $tmp_nome = $_FILES['avatar']['tmp_nome'];
                            $error = $_FILES['avatar']['error'];
                            if($error === 0) {
                                // obter extensões de imagem armazená-lo em var
                                $img_extencao = pathinfo($img_nome, PATHINFO_EXTENSION);
                                //coverter a imagem em minusculo e converte em var
                                $img_extencao_min = strtolower($img_extencao);
                                //criando array que armazena permissão para upload de extensão de imagem
                                $img_upload = array("jpg", "jpeg", "png");
                                //verificando se a extensão da imagem está presente no array $img_upload
                                if(in_array($img_extencao, $img_upload)) {
                                    $nova_img_nome = $username.'.'.$img_extencao_min;
                                    $img_upload_pasta = '../../upload/'.$nova_img_nome;
                                    //move a imagem carregada para a pasta ./upload
                                    move_uploaded_file($tmp_nome, $img_upload_pasta);
                                }else{
                                    $erro = "Esse arquivo não foi possível carregar.";
                                    header("Locattion: ../../cadastro.php?error=$erro&$data");
                                    exit;
                                }
                        }else{
                            $erro = "Erro desconhecido!";
                            header("Locattion: ../../cadastro.php?error=$erro&$data");
                            exit;
                            }
                        }
                    }
                } 
                $senha = password_hash($senha, PASSWORD_DEFAULT);
                if (isset($nova_img_nome)){
                    $sql = "INSET INTO users(nome, username, senha, avatar) VALUES (?,?,?,?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$nome, $username, $senha, $nova_img_nome]);
                }else {
                    $sql = "INSERT INTO users (nome, username, senha) VALUES (?,?,?)";
                    $stmt->execute([$nome, $username, $senha]);
                }
                // mensagem de registro
                $registrado = "Conta criada com sucesso!";

                header("Location: ../../index.php?success=$sm");
                exit;
        } else{
            header("Location: ../../cadastro.php");
        }
