
<script>

</script>

<link href="/klasstation/jquery/bootstrap/summernote.css" rel="stylesheet">

<script type="text/javascript" src="/klasstation/jquery/bootstrap/bootstrapsm.js"></script>
<script type="text/javascript" src="/klasstation/jquery/bootstrap/summernote.js"></script>

<link href="/klasstation/jquery/bootstrap/bootstrapsm.css" rel="stylesheet">



<style>
.note-toolbar{
	width:99% !important;
}
button[type="button"]{
	font-size: 11px;
	width: auto;
}

[teste][placeholder]:empty:before {
	content: attr(placeholder);
	color: #bababa;
}

h5{
	font-size: 14px;
	font-weight: 600;
}

h6{
	font-size: 13px !important;
	font-weight: 600 !important;
}

</style>
<?php 
$tipo_usuario = $_SESSION['tipo_user']; 

if($tipo_usuario == '1' or $tipo_usuario == '2'){
	$has_perm = true;
}
else
{
	$has_perm = false;
}


if($has_perm == true){}

	$action = @(int)$_REQUEST['action']; // 0 -> resolver, 1 -> criar, 2 -> editarecho $action;

switch ($action) {
	case 0: // Responder
	$id_exercicio = @(int)$_REQUEST['id_trophy']; // 

	$sql_exercicios = mysqli_query($conectar, "Select * from ks_exercicios
		INNER JOIN ks_valor_trophy ON ks_exercicios.valor_trophy = ks_valor_trophy.id_valor_t
		WHERE id_trophy = '$id_exercicio'");

	$sql_rel_conquistas = mysqli_query($conectar, "Select * from ks_rel_trophy
											WHERE id_trophy = '$id_exercicio' AND id_user = '$id_user'");
										
$verif_conq_user = mysqli_num_rows($sql_rel_conquistas);
$resolvido = false;
if($verif_conq_user > 0){
	$resolvido = true;
}
	while($dados_exercicios = mysqli_fetch_assoc($sql_exercicios))
	{


		$titulo_c = $dados_exercicios['titulo_trophy'];
		$descr_c = $dados_exercicios['descr_trophy'];
		$desafio_c = $dados_exercicios['desafio_trophy'];
		$valor = $dados_exercicios['img_valor_t'];
		$dica = $dados_exercicios['ajuda_trophy'];
		$rel_cap = $dados_exercicios['rel_cap_trophy'];
		$obs_correcao = $dados_exercicios['obs_correcao'];

		if(!$resolvido){
			$valor = "imagens/tp_hidden.png";
		}
		else{
			$sql_rel_respostas = mysqli_query($conectar, "Select * from ks_rel_respostas
											WHERE id_exercicio = '$id_exercicio' AND id_user = '$id_user' AND id_disciplina = '$id_disciplina_sel'");
			while($dados_respostas = mysqli_fetch_assoc($sql_rel_respostas)){
				$resposta_txt = $dados_respostas['relresp_texto'];
			}
		}

	}   ?>

	<div class="geral_respex"> <!-- conteudo geral exercícios -->
		<div class="topo_respex"> <!-- topo exercício -->
			<div class="imgtrophy_respex"><img src="<?php echo '/klasstation/'.$valor; ?>"></div> <!-- imagem trophy -->
			<div class="corpotopo_respex"> <!-- corpo topo exerício -->
				<div class="titulo_respex"><?php echo $titulo_c; ?></div> <!-- Título do exercício -->
				<div class="descr_respex"><?php echo $descr_c; ?></div> <!-- Descrição do exercício -->
			</div>                		
		</div>
		<div class="enunciado_respex"><?php echo $desafio_c;?></div> <!-- Enunciado do exercício -->
		<div class="corpomeio_respex">
			<div class="meio_esq_respex"> <!-- corpo esquerdo exercício -->
				<div class="areatxt_respex">
				<script>
					$(document).ready(function() {
						$('#summernote').summernote({placeholder: "<?php echo "$dica"; ?>", width: 530, height: 300, toolbar: [
								    // [groupName, [list of button]]
								    ['style', ['bold', 'italic', 'underline', 'clear']],
								    ['font', ['strikethrough']],
								    ['fontsize', ['fontsize']],
								    ['color', ['color']],
								    ['para', ['ul', 'ol', 'paragraph']],
								    ['height', ['height']]
								    ]});
					});

				</script>

				<form id="new_resp" name="novaresposta" method="post" action="/klasstation/scripts/scr_querys.php" align="center">
					<input type="hidden" name="id_exercicio" value="<?php echo $id_exercicio; ?>" /><p>
					<input type="hidden" name="id_user" value="<?php echo $id_logado_s; ?>" /><p>
					<input type="hidden" name="id_disciplina" value="<?php echo $id_disciplina_sel; ?>" /><p>
					<input type="hidden" name="obs_correcao" value="<?php echo $obs_correcao; ?>" /><p>
					<input type="hidden" name="type" value="add_resposta" /><p>
						<?php if($resolvido){?>
							<textarea teste id="summernote" name="text_resposta"><?php echo @$resposta_txt;?></textarea>
						<?php }else{ ?>
						<textarea teste id="summernote" name="text_resposta"></textarea>
					<?php } ?>
					
					<button>Enviar Resposta</button>
				</form>
				</div>
				<div class="comentarios_respex">
				</div>
			</div>

			<div class="meio_dir_respex"> <!-- corpo direito exercício -->
				<h5>O que preciso para resolver o exercício?</h5>
				<div class="titulo_ajuda">
					<h6>Estude o capítulo:</h6>
				</div>
				<div class="ajuda_caps_respex">
							<?php if(@$rel_cap){
							$sql_capitulos = mysqli_query($conectar, "Select * from ks_rel_plancap
                                  			WHERE id_disciplina = '$id_disciplina_sel' AND id_plancap = $rel_cap ORDER BY cap_num");

                                 while($dados_cap = mysqli_fetch_assoc($sql_capitulos))
                                 {
                                    $id_cap_list = $dados_cap['id_plancap'];
                                    $cap_titulo = $dados_cap['cap_titulo'];
                                    $num_cap_t = $dados_cap['cap_num'];

                                    
                                }
                                ?>
  				<a target="_blank" href="<?php echo "/klasstation/disciplina/planoaula/$id_turma/$id_disciplina/0/$num_cap_t"?>"><?php echo $num_cap_t;?>. <?php echo $cap_titulo; ?> </a><?php } ?>
				</div>
				<div class="titulo_ajuda">
					<h6>Estude os materiais complementares:</h6>
				</div>
				<div class="ajuda_mat_respex">
					<img src="/klasstation/imagens/pdf_icon.png" width="40">
					<img src="/klasstation/imagens/video_icon.png" width="40" >
				</div>
				<div class="obs_respex">
					<h6>Observações:</h6>
					<?php if($obs_correcao == "1")
					{echo "Necessária a correção para liberar troféu.";}else{echo "Não é necessária a correção para liberar troféu.";} 
					?>
					 
					
				</div>
				<div class="versoes_respex">
				</div>
			</div>
		</div>

		

	</div>
<?php  break;
        case 1: // Cadastrar novo exercício?>
        <form id="novo_exercicio" name="novo_exercicio" method="post" action="/klasstation/scripts/scr_querys.php" align="center">

       		<div class="geral_respex"> <!-- conteudo geral exercícios -->
		<div class="topo_respex"> <!-- topo exercício -->
			<div class="imgtrophy_respex"><select  name="valor_trophy" > 
								<?php
								$sql = mysqli_query($conectar, "Select * from ks_valor_trophy order by id_valor_t");
								while($dados = mysqli_fetch_assoc($sql))
								{	
									$id_val_trophy = $dados['id_valor_t'];
									$descr_val_trophy = $dados['descr_valor_t'];
									$img_val_trophy = $dados['img_valor_t'];
									echo "<option value=".$id_val_trophy."> $descr_val_trophy  </option>";
								}
								?>

							</select></div> <!-- imagem trophy -->
			<div class="corpotopo_respex"> <!-- corpo topo exerício -->
				<div class="titulo_respex"><input placeholder="Insira um título para o exercício" type="text" size="100" name="titulo_trophy" /></div> <!-- Título do exercício -->
				<div class="descr_respex"><input placeholder="Insira uma breve descrição do exercício" type="text" size="121" name="descr_trophy" /></div> <!-- Descrição do exercício -->
			</div>                		
		</div>
		<div class="enunciado_respex"><textarea placeholder="Insira o enunciado completo do exercício." cols="150" rows="5" type="text"  name="desafio_trophy" /></textarea></div> <!-- Enunciado do exercício -->
		<div class="corpomeio_respex">
			<div class="meio_esq_respex"> <!-- corpo esquerdo exercício -->
				<div class="areatxt_respex">
				<script>
					$(document).ready(function() {
						$('#summernote').summernote({placeholder: "Insira uma dica para o aluno resolver este exercício", width: 530, height: 300, toolbar: [
								    // [groupName, [list of button]]
								    ['style', ['bold', 'italic', 'underline', 'clear']],
								    ['font', ['strikethrough']],
								    ['fontsize', ['fontsize']],
								    ['color', ['color']],
								    ['para', ['ul', 'ol', 'paragraph']],
								    ['height', ['height']]
								    ]});
					});

				</script>

				
					<textarea id="summernote" name="text_resposta"></textarea>
					
				
				</div>
				<div class="comentarios_respex">
				</div>
			</div>

			<div class="meio_dir_respex"> <!-- corpo direito exercício -->
				<h5>O que o aluno precisa para resolver?</h5>
				<div class="titulo_ajuda">
					<h6>Estudar o capítulo:</h6>
				</div>
				<div class="ajuda_caps_respex">
					<select style="max-width: 80%;" name="cap_trophy" > 
								<?php
								 $sql_capitulos = mysqli_query($conectar, "Select * from ks_rel_plancap
                                  WHERE id_disciplina = '$id_disciplina_sel' ORDER BY cap_num");

								while($dados = mysqli_fetch_assoc($sql_capitulos))
								{	
									$id_cap = $dados['id_plancap'];
									$cap_num = $dados['cap_num'];
									$cap_titulo = $dados['cap_titulo'];
									echo "<option value=".$id_cap.">".$cap_num.". ".$cap_titulo."</option>";
								}
								?>

							</select>
				</div>
				<div class="titulo_ajuda">
					<h6>Estude os materiais complementares:</h6>
				</div>
				<div class="ajuda_mat_respex">
					<img src="imagens/pdf_icon.png" width="40">
					<img src="imagens/video_icon.png" width="40" >
				</div>
				<div class="obs_respex">
					<h6>Observações:</h6>
					 <input type="checkbox" name="obs_correcao" value="1"> Necessária a correção para liberar troféu.
				</div>
				<div class="versoes_respex">
					<input type="hidden" name="id_disci_trophy" value="<?php echo $id_disciplina_sel; ?>" /><p>
						 <input type="hidden" name="type" value="new_exercicio" /><p>
					<input type="submit" id="btn_acessar" value="Criar" />
				</div>
			</div>
		</div>
        <?php break; } ?>