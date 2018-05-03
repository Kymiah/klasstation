
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>KlasStation</title>

		<!-- CSS -->
		<link rel="stylesheet" href="/klasstation/css/turmas.css"/>
		<link rel="stylesheet" href="/klasstation/css/topo.css"/>
		<link rel="stylesheet" href="/klasstation/css/menu_lado.css"/>
		<link rel="stylesheet" href="/klasstation/css/calendario.css"/>

		
		<link rel="stylesheet" href="/klasstation/jquery/bootstrap/bootstrap.css"/>
		<script type="text/javascript" src="/klasstation/jquery/bootstrap/bootstrap.js"></script>
		<script type="text/javascript" src="/klasstation/jquery/bootstrap/bootstrapsm.js"></script>
		<script type="text/javascript" src="/klasstation/jquery/bootstrap/summernote.js"></script>

		
	</head>


	<?php session_start();
	$tipo_usuario = $_SESSION['tipo_user'];
	if($tipo_usuario == '1'){
		$has_perm = true;
	}
	else
	{
		$has_perm = false;
	}

		
	/***********************/
	//var_dump($_REQUEST);
	$id_logado_s = $_SESSION['id_user'];

	$id_turma_sel = $_REQUEST['id_turma'];
	$id_disciplina_sel = $_REQUEST['id_disci'];
	@$menu_sel = $_REQUEST['menu'];

	if(!@$user_selected){
		$user_selected = $id_logado_s;
	}

	if(!@$menu_sel){
		$menu_sel = 'inicio';
	}

	/*
	$id_disciplina_sel = $_REQUEST['id_disc'];
	$id_turma_sel = $_REQUEST['id_turma'];
	@$user_selected = $_REQUEST['user_selected'];
	@$menu_sel = $_REQUEST['menu'];
	

	
	*/

	
	?>
	<!-- ### SCRIPTS ### -->
	

	<script type="text/javascript">

		function give_trophy(id_user, id_trophy, nome_form) { 
			
			var formToSubmit = document.getElementById('sbmt' + id_trophy);
			formToSubmit.submit();
			
		}; 

		function responder(id_trophy) { 
			
			var formToSubmit = document.getElementById('resp' + id_trophy);
			formToSubmit.submit();
			
		}; 

		$(document).ready(function() { 
			$('#new_conquista').click(function() { 
				$.blockUI({ message: $('#question'), css: { width: '350px', height: '400px' },
					onOverlayClick: $.unblockUI }); 
			}); 
		});

	</script>
	<!-- ################### -->	
	<body>



		<div class="geral">
			<div class="topo">
				<div class="bar_top_index">
					<!-- ### INCLUDES ### -->
				</div>
				<div class="fundo_topo_index">
					<div class="infos_topo">
						<?php include("includes/dados_topo.php");  ?>
					</div>
	            <!--<div class="menu_topo">
	            	<?php include("includes/menu_topo.php"); ?>
	            </div>-->
	            
	            
	            
	        </div>
	        <div class="bar_b_top_index">
	        	<!-- ################### -->
	        </div>
	    </div>
	    <div class="menu_lado">
	    	<div class="menu_lado_nav">

	    	<div class="trofeis_topo">
	    		<?php include("includes/trophys_topo.php"); ?>
	    	</div>

	    	<?php  include("includes/menu_lado.php");   ?>
	    </div>
	</div>

	    
	    <?php
	    $sql_disc = mysqli_query($conectar, "Select * from ks_disciplinas
	    	INNER JOIN ks_turmas
	    	INNER JOIN ks_cursos
	    	ON ks_disciplinas.id_curso = ks_turmas.id_curso = ks_cursos.id_curso
	    	where ks_disciplinas.id_disciplina = '$id_disciplina_sel' AND ks_turmas.id_turma = '$id_turma_sel'");

	    while($dados_t = mysqli_fetch_assoc($sql_disc))
	    { 

						//INSTITUIÇÃO
	    	$id_instituicao = $dados_t['id_instituicao'];
	    	$sql_i = mysqli_query($conectar, "Select * from ks_instituicoes
	    		where id_inst = '$id_instituicao'");while($dados_i = mysqli_fetch_assoc($sql_i))
	    	{	$nome_instituicao = $dados_i['inst_nome'];	}

						//DISCIPLINA
	    	$id_disciplina = $dados_t['id_disciplina'];	
	    	$disc_nome = $dados_t['disc_nome'];	
	    	$id_professor = $dados_t['id_professor'];
	    	$sql_p = mysqli_query($conectar, "Select * from ks_usuarios
	    		where id_user = '$id_professor'");while($dados_p = mysqli_fetch_assoc($sql_p))
	    	{	$nome_professor = $dados_p['nome_user']; 
	    		$avatar_professor = $dados_p['avatar_user'];
	    		$email_professor = $dados_p['email_user'];	}

						//TURMA
	    	$id_turma = $dados_t['id_turma'];
	    	$turma_nome = $dados_t['turma_nome'];
	    	$turma_periodo = $dados_t['turma_periodo'];

						//CURSO	
	    	$id_curso = $dados_t['id_curso'];
	    	$curso_nome = $dados_t['curso_nome'];
	    	$curso_icone = $dados_t['curso_icone'];							

	    	?>
	    	<div class="centro">
	    		<div class="centro_nav">
	    		<div class="topo_centro">
	    			<a href="turmas.php"><div class="btn_voltar_cad"> < </div></a>
	    			<div class="inst_cid_top_turma"><?php echo $nome_instituicao. "/" . $curso_nome."/".$turma_nome ?> </div>
	    		</div>

	    		<?php


						/*$sql_u = mysqli_query($conectar, "Select * from ks_usuarios where id_user = '$id_dono_turma'");
						while($dados_u = mysqli_fetch_assoc($sql_u))
						{
							
								$nome_user = $dados_u['nome_user']." ".$dados_u['sobrenome_user'];
							
							}*/

							$sql_q = mysqli_query($conectar, "Select * from ks_rel_turmas where id_turma = '$id_turma'");
							$qtd_alunos = mysqli_num_rows($sql_q); 
							?>


							<div class="p_turma">
								<div class="turma_icon">
									<img src="<?php //echo $curso_icone; ?>" />
								</div>

								<div class="dados1_turma_p">
									<div style="font-size: 14px; color: #939393;">Disciplina</div>
									<div class="disci_nome_topo">
										<?php echo $disc_nome; ?> <span class="qtd_aluno_turma"></span>
									</div>

									<div class="create_by_turma">
										
									</div>
								</div>
								<div class="dados2_turma_p">
									<div class="prof_d2_p_turma">Professor</div>
									<div style="display: flex;"><?php 
									if($id_professor != 0){?>
										<div class="img_prof_disci" ><img style="image-rendering: pixelated; margin-left: -1px; margin-top: -1px;" width="40" src="/klasstation/<?php echo $avatar_professor; ?>" /></div>
										<div class="dados_prof_topo">
										<div style="font-size: 15px;"><?php echo $nome_professor; ?></div>
										<div><?php echo $email_professor; ?></div>
										</div>

									<?php }


									if($has_perm){ ?>










									<?php } ?></div>
								</div>
							</div>

							<div class="bar_p_turma_top">

							</div>  

							<div class="menu_perfil_turma">
								<?php  

								if(@$_REQUEST['user_selected']){			
									$aluno_selected = $_REQUEST['user_selected'];
									$sql_aluno_sel = mysqli_query($conectar, "Select * from ks_usuarios WHERE id_user = '$aluno_selected'");

									while($dados_aluno_sel = mysqli_fetch_assoc($sql_aluno_sel))
									{	

										$nome_aluno_sel = $dados_aluno_sel['nome_user']." ".$dados_aluno_sel['sobrenome_user'];

									}
									?>

									<div class="item_info_user_turma">
										<?php //echo $nome_aluno_sel; ?>
									</div>
									<?php
								}else
								{ ?>
									<!--<div class="item_info_user_turma">
										<?php //echo $_SESSION['nome_user']; ?>
									</div>-->
									<?php }
									?>	

									<?php /* ######## Criptografar dados que serão transmitidos ######								
										$uc = $id_turma_sel."/".$id_disciplina_sel."/".$user_selected."/0";
   										$url_cript = url_encrypt($uc, $pass_cript);
										########################################################### */
									?>

									<a href="<?php echo "/klasstation/disciplina/inicio/$id_turma/$id_disciplina" ?>">
										<div class="item_menu_perfil_turma">
											Início
										</div>
									</a>

									<?php /* ######## Criptografar dados que serão transmitidos ######								
										$uc = $id_turma_sel."/".$id_disciplina_sel."/".$user_selected."/1";
   										$url_cript = url_encrypt($uc, $pass_cript);
										########################################################### */
									?>

									<a href="<?php echo "/klasstation/disciplina/exercicios/$id_turma/$id_disciplina" ?>">
										<div class="item_menu_perfil_turma">
											Exercícios
										</div>
									</a>

									<?php /* ######## Criptografar dados que serão transmitidos ######								
										$uc = $id_turma_sel."/".$id_disciplina_sel."/".$user_selected."/2";
   										$url_cript = url_encrypt($uc, $pass_cript);
										########################################################### */
									?>
									<a href="<?php echo "/klasstation/disciplina/planoaula/$id_turma/$id_disciplina" ?>">
										<div class="item_menu_perfil_turma">
											Plano de Aula
										</div>
									</a>
								</div>   



								    <?php
		if($menu_sel == "inicio"){
			include("includes/disci_inicio.php");
		}     ?>

		
			<?php include("includes/disci_direita.php"); ?>
		
					

					<!--<div class="rodape_perfil_turma">       
					</div>-->
	</div> 
</div>
				<?php
			}
			

			
			?>    



		</div>
	</div>


</body>
</html>