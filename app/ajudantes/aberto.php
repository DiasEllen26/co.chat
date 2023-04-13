<?php 

function aberto($id, $con, $chats){
    foreach ($chats as $chat) {
    	if ($chat['aberto'] == 0) {
    		$aberto = 1;
    		$chat_id = $chat['chat_id'];

    		$sql = "UPDATE chats
    		        SET   aberto = ?
    		        WHERE para_id=? 
    		        AND   chat_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$aberto, $id, $chat_id]);

    	}
    }
}