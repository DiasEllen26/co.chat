<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "root";
    $banco = "co.chat";

    try {
        $con = new PDO("mysql:hot=$servidor;dbname=$co.chat,$usuario,$senha");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
        catch(PDOException $e){
            echo "Sem conexão com banco de dados > " . $e->getMessage();
        }