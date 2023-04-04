<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "root";
    $banco = "cochat";

    try {
        $con = new PDO("mysql:host={$servidor};dbname={$banco};port=3386;charset=utf8;",$usuario,$senha);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
        catch(PDOException $e){
            echo "Sem conexão com banco de dados > ".$e->getMessage();
        }