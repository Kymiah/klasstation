<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 
include("connect.php");
$id_turma = $_POST['id_turma'];
$id_user = $_POST['id_user'];
$id_indicador = $_POST['id_indicador'];


$sql_verf_indicador = mysqli_query($conectar, "Select * from ks_rel_indicadores WHERE ri_id_turma = '$id_turma' AND ri_id_aluno = '$id_user' AND ri_id_ind = '$id_indicador'");

			while($verif_ind = mysqli_fetch_assoc($sql_verf_indicador))
		{
			$id_rel_ind = $verif_ind['id_ri'];
			$ri_exp = $verif_ind['ri_exp'];
			$ri_next_exp = $verif_ind['ri_next_exp'];
			$ri_level = $verif_ind['ri_level'];
			$ri_exp_att = $verif_ind['ri_exp_att'];
			
			$new_exp = $ri_exp;
			$new_level = $ri_level;
			$new_nexp_exp = $ri_next_exp;
			$new_exp_att = $ri_exp_att;
			
			
			if($ri_exp + $ri_exp_att >= $ri_next_exp)
			{
				$sobra = ($ri_exp + $ri_exp_att) - $ri_next_exp;
				$new_exp = 0 + $sobra;
				$new_level = $ri_level + 1;
				$new_nexp_exp = $ri_next_exp + $ri_exp_att; 
				$new_exp_att = ($new_nexp_exp*1/100+$ri_exp_att)-($ri_exp_att*10/100);
			}
			else
			{
				$new_exp = $ri_exp + $ri_exp_att;	
			}
			
			
			
			$sql_update_indicador = mysqli_query($conectar, "UPDATE ks_rel_indicadores SET ri_exp = '$new_exp', ri_exp_att = '$new_exp_att', ri_next_exp = '$new_nexp_exp', ri_level = '$new_level' WHERE ri_id_turma = '$id_turma' AND ri_id_aluno = '$id_user' AND ri_id_ind = '$id_indicador' ");
		}
		?>
		<script>
				window.location="../perfil_turma.php?id_turma=<?php echo $id_turma; ?>&user_selected=<?php echo $id_user; ?>";
        </script>