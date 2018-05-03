<?php
	include('connect.php');
	session_start();
$titulo_trophy = $_POST['titulo'];
$descr_trophy = $_POST['descricao'];
$valor_trophy = $_POST['valor'];
$turma_trophy = $_POST['turma'];


		
        $sql_trophy= mysqli_query($conectar, "INSERT INTO ks_trophy VALUES ('', '$valor_trophy', '$titulo_trophy', '$descr_trophy', '$turma_trophy')");
		
		?>
		<script>
			//alert("Turma criada com sucesso!");
			window.location="../perfil_turma.php?id_turma=<?php echo $turma_trophy ?>";
        </script>
		<?php		   		
		