
<?php 

function getChat($id_1, $id_2, $con){
   
   $sql = "SELECT * FROM chat
           WHERE (de_id=? AND para_id=?)
           OR    (para_id=? AND de_id=?)
           ORDER BY chat_id ASC";
    $stmt = $con->prepare($sql);
    $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

    if ($stmt->rowCount() > 0) {
    	$chats = $stmt->fetchAll();
    	return $chats;
    }else {
    	$chats = [];
    	return $chats;
    }

}