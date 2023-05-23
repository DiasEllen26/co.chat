<?php

function aberto($id, $con, $chats)
{
	foreach ($chats as $chat) {
		if ($chat['aberto'] == 0) {
			$aberto = 1;
			$chat_id = $chat['id'];

			$sql = "UPDATE chat
    		        SET   aberto = ?
    		        WHERE para_id=? 
    		        AND   id = ?";
			$dados = $con->prepare($sql);
			$dados->execute([$aberto, $id, $chat_id]);
		}
	}
}
