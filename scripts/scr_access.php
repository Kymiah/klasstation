<?php
//Carrega as variáveis com os valores que foram inseridos no ###FORMULÁRIO###.
include("connect.php");

session_start();

$type = $_REQUEST['type'];
$id_user = $_SESSION['id_user'];


if($type == 'curso'){

	$id_curso = $_REQUEST['id_curso'];

	$sql_access_curso = mysqli_query($conectar, "INSERT INTO ks_rel_cursos VALUES (NULL, '$id_curso', '$id_user', '0')");

}

if($type == 'turma'){

	$id_turma = $_REQUEST['id_turma'];

	$sql_access_turma = mysqli_query($conectar, "INSERT INTO ks_rel_turmas VALUES (NULL, '$id_turma', '$id_user', '0')");

}

if($type == 'disciplina'){

	$id_disciplina = $_REQUEST['id_disciplina'];

	$sql_access_disciplina = mysqli_query($conectar, "INSERT INTO ks_rel_disciplinas VALUES (NULL, '$id_disciplina', '$id_user', '0')");

}?>

			<script>
				window.location=window.history.go(-1);
            </script>
<?php	
