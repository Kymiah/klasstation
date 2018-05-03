<?php
	include('connect.php');
	session_start();
$titulo_trophy = $_POST['titulo_trophy'];
$descr_trophy = $_POST['descr_trophy'];
$desafio_trophy = $_POST['desafio_trophy'];
$id_trophy = $_POST['valor_trophy'];
$id_disciplina = $_POST['id_disci_trophy'];

		
        $sql_turma= mysqli_query($conectar, "INSERT INTO ks_trophy VALUES (NULL, '$id_trophy', '$titulo_trophy', '$descr_trophy', '$desafio_trophy' , '$id_disciplina')");
		
		?>
		<script>
			//alert("Conquista adicionada com sucesso!");
			window.location=window.history.go(-1);
        </script>
			   	