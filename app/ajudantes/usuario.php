<?php
function getUsuario($username, $con){
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$username]);

    if ($stmt->rowCount() === 1){
        $usuario = $stmt->fetch();
        return $usuario;
    } else {
        $usuario = [];
        return $usuario;
    }
    }