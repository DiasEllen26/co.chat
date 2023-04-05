<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "cochat";

    try {
        $con = new PDO("mysql:host=$servidor;dbname=$banco;port=3306;charset=utf8;",$usuario,$senha);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
catch(PDOException $e){
            error_log("Failed to connect to database: " . $e->getMessage(), 0);
        }