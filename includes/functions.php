<?php 

function criaProg($id_disc, $id_user){
	global $conectar;

	$sql_qtd_exTotal = mysqli_query($conectar, "Select * from ks_exercicios
								WHERE id_disciplina = '$id_disc'");

	$qtd_exTotal = mysqli_num_rows($sql_qtd_exTotal);

	$sql_qtd_exConcluido = mysqli_query($conectar, "Select * from ks_rel_trophy
								WHERE id_disciplina = '$id_disc' AND id_user = '$id_user'");

	$qtd_exConcluido = mysqli_num_rows($sql_qtd_exConcluido);

	$steps = array();
	echo '<table border="0" width="100%"><tr align="center" height="30">';
	for ($i=0; $i <= $qtd_exTotal ; $i++) { 
		$steps[$i] = $i;
		if($steps[$i] == 0){
			echo '<td align="left"><div class="step_conc"></div></td>';
		}else if($steps[$i] > 0 && $steps[$i] <= $qtd_exConcluido){
			if($steps[$i] == $qtd_exConcluido){
				echo '<td width="10"><img src="/klasstation/imagens/pcman.gif"></td>';
			}else{
				echo '<td><div class="step_conc"></div></td>';
			}
			
		}else if($steps[$i] < $qtd_exTotal){ 
			echo '<td><div class="step_norm"></div></td>';
		}else{ 
			echo '<td align="right"><div class="step_norm_f"></div></td>';
		}	
		
	}
	$porc_conc = ($qtd_exConcluido * 100)/$qtd_exTotal;
	echo '</tr><tr>';
	echo '<td colspan ="'.($qtd_exTotal + 1).'"> <div class="bar_progn"><div class="bar_progc" style="width:'.$porc_conc.'%;"></div></div></td>';
	echo '</tr></table>';

	
}