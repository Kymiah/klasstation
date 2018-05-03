<?php 
function num($num){
	return ($num < 10) ? '0'.$num : $num;
}
	function montaEventos($info){
		global $conectar;
		$data = $info['data'];
		$titulo = $info['titulo'];
		$disciplina = $info['disciplina'];
		if($disciplina != '*'){$disc_cond = " AND id_disciplina = '".$disciplina."'";}else{$disc_cond=" ";}

		$eventos =  mysqli_query($conectar, "SELECT * FROM ks_caleventos WHERE  ".$data." >= NOW()".$disc_cond."");

		$retorno = array();
		while($dados_e = mysqli_fetch_assoc($eventos)){
			$dataArr = date('Y-m-d', strtotime($dados_e[$data]));
			$retorno[$dataArr] = array(
				'titulo' => $dados_e[$titulo]
			);
		}
		return $retorno;
	}
	function diasMeses(){
		$retorno = array();

		for($i = 1; $i<=12; $i++){

			$retorno[$i] = cal_days_in_month(CAL_GREGORIAN, $i, date('Y'));
		}

		return $retorno;
	}

	function montaCalendario($eventos = array()){
		$daysWeek = array(
			'Sun',
			'Mon',
			'Tue',
			'Wed',
			'Thu',
			'Fri',
			'Sat'
		);

		$diasSemana = array(
			'Dom',
			'Seg',
			'Ter',
			'Qua',
			'Qui',
			'Sex',
			'Sab'
		);

		$arrayMes = array(
			1 => 'Janeiro',
			2 => 'Fevereiro',
			3 => 'Março',
			4 => 'Abril',
			5 => 'Maio',
			6 => 'Junho',
			7 => 'Julho',
			8 => 'Agosto',
			9 => 'Setembro',
			10 => 'Outubro',
			11 => 'Novembro',
			12 => 'Dezembro'
		);

		$diasMeses = diasMeses();
		$arrayRetorno = array();

		for ($i=1; $i <= 12 ; $i++) { 
			$arrayRetorno[$i] = array();
			
			for ($n=1; $n <= $diasMeses[$i]; $n++) { 
				$dayMonth = GregorianToJD($i, $n, date('Y'));
				$weekMonth = JDDayOfWeek($dayMonth, 2);
				if($weekMonth == 'Mun') $weekMonth = 'Mon';
				$arrayRetorno[$i][$n] = $weekMonth;
			}
		}
		
		echo '<a href="#" id="volta"> &laquo; </a><a href="#" id="vai"> &raquo; </a>';
		echo '<table border=0 width="100%">';
		foreach ($arrayMes as $num => $mes) {
			echo '<tbody id="mes_'.$num.'" class="mes">';

			echo '<tr class="mes_title"><td colspan="7">'.$mes.'</td></tr>';
			echo '<tr class="semana_title">';
			foreach ($diasSemana as $i => $day) {
				echo '<td>'.$day.'</td>';
			}

			echo '</tr><tr>';
			$y = 0;
			foreach ($arrayRetorno[$num] as $numero => $dia) {
				$y++;
				if($numero == 1){
					$qtd = array_search($dia, $daysWeek);
					for ($i=1; $i<=$qtd ; $i++) { 
						echo '<td></td>';
						$y+=1;
					}
				}

				if(count($eventos) > 0){
					$month = num($num);
					$daynow = num($numero);
					$date = date('Y').'-'.$month.'-'.$daynow;
					if(in_array($date, array_keys($eventos))){
						$evento = $eventos[$date];
						echo '<td class="dia_evento"><a href="#" title="'.$evento['titulo'].'">'.$numero.'</a></td>';

					}else{

						echo '<td>'.$numero.'</td>';
					}
				}else{
					echo '<td>'.$numero.'</td>';
				}
				if($y == 7){
					$y = 0;
					echo '<tr></tr>';
				}
			}

			echo '</tr></tbody>';
		}
		
		echo '</table>'; 
	}

?>