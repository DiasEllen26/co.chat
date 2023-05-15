<?php 
define('TIMEZONE', 'America/Sao_Paulo');
date_default_timezone_set(TIMEZONE);

function ultimovisto($data) {
	   $datahora = strtotime($data);	
	   $iniTempo = array("segundo", "minuto", "hora", "dia", "mes", "ano");
	   $duracao = array("60","60","24","30","12","10");

	   $currentTime = time();
	   if($currentTime >= $datahora) {
			$diferenca = time()- $datahora;
			for($i = 0; $diferenca >= $duracao[$i] && $i < count($duracao)-1; $i++) {
			$diferenca = $diferenca / $duracao[$i];
			}

			$diferenca = round($diferenca);
			if($diferenca < 59 && $iniTempo[$i] == "segundo") {
				return 'Ativo';
			}else{
				return $diferenca . " " . $iniTempo[$i] . "(s) atrás ";
			}
			
	   }
}