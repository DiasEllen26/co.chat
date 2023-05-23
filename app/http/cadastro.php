<?php
//obtem dados da solicitação de post e armazena em variaveis

if (
    isset($_POST['username']) &&
    isset($_POST['nome']) &&
    isset($_POST['senha'])
) {
    include "config.php";
    $username = $_POST['username'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    //faz formato de dados URL
    $data = 'name=' . $nome . '&username=' . $username;
    //verifica se o username, nome e senha do usuário foi enviado
    if (empty($nome)) {
        //mensagem de erro
        $erro = "Nome é obrigatório";
        //redirecionar para 'inscreva-se.php' e passar mensagem de erro
        header("Location: ../../cadastro.php?error=$erro");
        exit;
    } else if (empty($username)) {
        $erro = "Userame é obrigatório";
        header("Location: ../../cadastro.php?error=$erro");
        exit;
    } else if (empty($senha)) {
        $erro = "Senha é obrigatório";
        header("Location: ../../cadastro.php?error=$erro&$data");
        exit;
    } else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$username]);
        if ($stmt->rowCount() > 0) {
            $erro = "O username ($username) está indisponível";
            header("Location: ../../cadastro.php?error=$erro&$data");
            exit;
        } else {
            // foto de perfil carregada
            if (isset($_FILES['avatar'])) {
                // obter dados e armazená-los em variáveis
                $img_nome = $_FILES['avatar']['name'];
                $tmp_nome = $_FILES['avatar']['tmp_name'];
                $error = $_FILES['avatar']['error'];

                if ($error === 0) {
                    // obter extensão da imagem e armazená-la em uma variável
                    $img_extensao = pathinfo($img_nome, PATHINFO_EXTENSION);
                    // converter a extensão da imagem para minúsculas
                    $img_extensao_min = strtolower($img_extensao);

                    // criar um array que armazena as extensões de imagem permitidas para upload
                    $img_upload = array("jpg", "jpeg", "png");

                    // verificar se a extensão da imagem está presente no array $img_upload
                    if (in_array($img_extensao_min, $img_upload)) {
                        $nova_img_nome = $username . '.' . $img_extensao_min;
                        $img_upload_pasta = '../../uploads/' . $nova_img_nome;

                        // mover o arquivo carregado para a pasta de upload
                        move_uploaded_file($tmp_nome, $img_upload_pasta);
                    } else {
                        $erro = "Esse arquivo não pôde ser carregado.";
                        header("Location: ../../cadastro.php?error=$erro");
                        exit;
                    }
                } else {
                    $erro = "Erro desconhecido!";
                    header("Location: ../../cadastro.php?error=$erro");
                    exit;
                }
            }
        }
    }
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    if (isset($nova_img_nome)) {
        $sql = "INSERT INTO users(nome, username, senha, avatar) VALUES (?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$nome, $username, $senha, $nova_img_nome]);
    } else {
        $sql = "INSERT INTO users (nome, username, senha) VALUES (?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$nome, $username, $senha]);
    }
    // mensagem de registro
    $registrado = "Conta criada com sucesso!";
    header("Location: ../../index.php?success=$registrado");
    exit;
} else {
    header("Location: ../../cadastro.php");
}