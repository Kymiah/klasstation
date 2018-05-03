<?php
	include('connect.php');
	session_start();
	/*criptografia da url*/
			
	/***********************/
	//@$url_cript = $_REQUEST['url'];
	//@$url_decript = explode("/", url_decrypt($url_cript, $pass_cript));

	if(@$_POST['type']){
		$type = $_POST['type'];
	}
	if(@$_REQUEST['type']){
		$type = $_REQUEST['type'];
	}
	
echo $type;


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
	
}

if($type == "new_cap"){
	$id_disciplina = $_POST['id_disc'];
	$txt_cap = $_POST['text_cap'];
	$titulo_cap = $_POST['titulo_cap'];
	$num_cap = $_POST['num_cap'];

	$sql_disciplinas= mysqli_query($conectar, "INSERT INTO ks_rel_plancap VALUES (NULL, '$id_disciplina', '$num_cap', '$titulo_cap', '$txt_cap')");
	
}

if($type == "edit_cap"){
	$id_cap = $_POST['id_cap'];
	$txt_cap = $_POST['text_cap'];
	$titulo_cap = $_POST['titulo_cap'];
	$num_cap = $_POST['num_cap'];

	$sql_disciplinas= mysqli_query($conectar, "UPDATE ks_rel_plancap SET cap_num = '$num_cap', cap_titulo = '$titulo_cap', cap_text = '$txt_cap' WHERE id_plancap = '$id_cap'");
	
}

if($type == "remove_cap"){
	$id_cap = $_REQUEST['id_cap'];

	$sql_disciplinas= mysqli_query($conectar, "DELETE FROM ks_rel_plancap WHERE id_plancap = '$id_cap'");
	
}

if($type == "new_exercicio"){

$titulo_trophy = $_POST['titulo_trophy'];
$descr_trophy = $_POST['descr_trophy'];
$desafio_trophy = $_POST['desafio_trophy'];
$id_trophy = $_POST['valor_trophy'];
$id_disciplina = $_POST['id_disci_trophy'];
@$rel_cap = $_POST['cap_trophy'];
@$ajuda_txt = $_POST['text_resposta'];
@$obs_correcao = $_POST['obs_correcao'];

if(!$rel_cap){
	$rel_cap = 0;
}

if(!$obs_correcao){
	$obs_correcao = 0;
}
		
        $sql_turma= mysqli_query($conectar, "INSERT INTO ks_exercicios VALUES (NULL, '$id_trophy', '$titulo_trophy', '$descr_trophy', '$desafio_trophy' , '$id_disciplina', '$ajuda_txt', '$rel_cap', '$obs_correcao')");

        ?>
		<script>
			
			window.location=window.history.go(-2);
        </script>
        <?php
			   	
}

if($type == "add_resposta"){
	$id_exercicio = $_POST['id_exercicio'];
	$id_user = $_POST['id_user'];
	$id_disciplina = $_POST['id_disciplina'];
	$txt_resposta = $_POST['text_resposta'];
	$obs_correcao = $_POST['obs_correcao'];

	if($obs_correcao != '1'){
		$sql_give_trophy= mysqli_query($conectar, "INSERT INTO ks_rel_trophy VALUES (NULL, '$id_exercicio', '$id_disciplina', '$id_user', now(), '0')");
	}

	$sql_turma= mysqli_query($conectar, "INSERT INTO ks_rel_respostas VALUES (NULL, '$id_user', '$id_disciplina', '$id_exercicio', '$txt_resposta', '1', '0')"); ?>
	<script>
			
		window.location=window.history.go(-2);
        </script>
        <?php 
}
?>


		<script>
			
			window.location=window.history.go(-1);
        </script>
			   	