
<?php

function getChat($id_1, $id_2, $con)
{

    $sql = "SELECT * FROM chat
           WHERE (para_id=? AND de_id=?)
           OR    (de_id=? AND para_id=?)
           ORDER BY id ASC";
    $dados = $con->prepare($sql);
    $dados->execute([$id_1, $id_2, $id_1, $id_2]);

    if ($dados->rowCount() > 0) {
        $chats = $dados->fetchAll();
        return $chats;
    } else {
        $chats = [];
        return $chats;
    }
}
