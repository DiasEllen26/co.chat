<?php

function ultimaConversa($id_1, $id_2, $con)
{
    $sql = "SELECT * FROM chat
           WHERE (para_id=? AND de_id=?)
           OR    (de_id=? AND para_id=?)
           ORDER BY id DESC LIMIT 1";
    $dados = $con->prepare($sql);
    $dados->execute([$id_1, $id_2, $id_1, $id_2]);

    if ($dados->rowCount() > 0) {
        $chat = $dados->fetch();
        return $chat['menssagem'];
    } else {
        $chat = '';
        return $chat;
    }
}
