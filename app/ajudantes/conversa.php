<?php
function getConversa($id, $con){

    $sql = "SELECT * FROM conversa WHERE usuario_1=? OR usuario_2=? ORDER BY id DESC";

    $stmt = $con->prepare($sql);
    $stmt->execute([$id, $id]);

    if($stmt->rowCount() > 0) {
        $conversa = $stmt->fetchAll();
        $usuario_data = [];

        foreach($conversa as $conversa) {
            if($conversa['usuario_1'] == $id) {
                $sql2 = "SELECT nome, username, avatar, visto FROM useres WHERE id=?";
                $stmt2 = $con->prepare($sql2);
                $stmt->execute([$conversa['usuario_2']]);
            }else {
                $sql2 = "SELECT nome, username, avatar, visto FROM useres WHERE id=?";
                $stmt2 = $con->prepare($sql2);
                $stmt->execute([$conversa['usuario_1']]);
            }
    
            $TodasConversas = $stmt2->fetchAll();

            array_push($usuario_data, $TodasConversas);
        }
        return $usuario_data;
     
    }else{
        $conversa = [];
        return $conversa;
    }
}