<?php
	include('connect.php');
	session_start();

$type = $_POST['type'];


if($type == "curso"){
	$nome_curso = $_POST['curso_nome'];
	$id_instituicao = $_POST['id_instituicao'];
	$icon_curso = $_POST['curso_icon'];

	$sql_turma= mysqli_query($conectar, "INSERT INTO ks_cursos VALUES (NULL, '$id_instituicao', '$nome_curso', '$icon_curso', '0')");

}

if($type == "turma"){
	$nome_turma = $_POST['turma_nome'];
	$turma_ciclo = $_POST['turma_ciclo'];
	$id_curso = $_POST['id_curso'];
	$turma_periodo = $_POST['turma_periodo'];

	$sql_turma= mysqli_query($conectar, "INSERT INTO ks_turmas VALUES (NULL, '$nome_turma', '$id_curso', '$turma_periodo', '$turma_ciclo')");
	
}

if($type == "disciplina"){
	$nome_disciplina = $_POST['disci_nome'];
	$id_turma = $_POST['id_turma'];
	$id_curso = $_POST['id_curso'];

	$sql_disciplinas= mysqli_query($conectar, "INSERT INTO ks_disciplinas VALUES (NULL, '$id_curso', '$id_turma', '$nome_disciplina', '2018/07/18')");
	
}?>
		<script>
			
			window.location=window.history.go(-1);
        </script>
			   	