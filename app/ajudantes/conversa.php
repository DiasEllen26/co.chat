<?php
function getConversa($id, $con){

    $sql = "SELECT * FROM conversa WHERE usuario_1=? OR usuario_2=? ORDER BY id DESC";
    $dados = $con->prepare($sql);
    $dados->execute([$id, $id]);

    if($dados->rowCount() > 0) {
        $conversas = $dados->fetchAll();
        $usuario_data = [];

        foreach($conversas as $conversa) {
            if($conversa['usuario_1'] == $id) {
                $sql = "SELECT * FROM users WHERE id=?";
                $dados = $con->prepare($sql);
                $dados->execute([$conversa['usuario_2']]);
            }else {
                $sql = "SELECT * FROM users WHERE id=?";
                $dados = $con->prepare($sql);
                $dados->execute([$conversa['usuario_1']]);
            }
            $TodasConversas = $dados->fetchAll();
            array_push($usuario_data, $TodasConversas[0]);
        }
        return $usuario_data;
    }else{
        $conversa = [];
        return $conversa;
    }
}