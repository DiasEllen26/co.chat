<?php
session_start();
if (isset($_SESSION['username'])) {
    //conexão com banco de dados
    include '../http/config.php';

    $id = $_SESSION['$id'];
    $sql = "UPDATE users SET visto = NOW() WHERE id = ?";
    $dados = $con->prepare($sql);
    $dados->execute([$id]);
} else {
    header("Location: ../../index.php");
    exit;
}
