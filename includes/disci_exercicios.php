<script type="text/javascript" src="/klasstation/jquery/bootstrap/bootstrap.js"></script>
<link rel="stylesheet" href="/klasstation/css/functions.css"/>
<?php include("includes/functions.php"); ?>
	
<div class="topo_exc">
<div class="topoesq_exc">
	<div> 
		<div>
			<?php  
			if($user_selected == 0){
				$sql_user_sel = $id_logado_s;
			}
			else
			{
				$sql_user_sel = $user_selected;
			}

			$sql_perfil_user = mysqli_query($conectar, "Select * from ks_usuarios WHERE id_user = '$sql_user_sel'");
			while($perfil_u = mysqli_fetch_assoc($sql_perfil_user))
			{
				$avatar_user = $perfil_u['avatar_user'];
				$nome_user = $perfil_u['nome_user'];
				$apelido_user = $perfil_u['apelido_user'];
				$whatsapp_user = $perfil_u['whatsapp_user'];

				$qtd_trophy = array();
				for($arr_count = 1; $arr_count <= 4; $arr_count++){

					$sql_trophy_qtd = mysqli_query($conectar, "Select * from ks_exercicios 
						INNER JOIN ks_rel_trophy ON ks_exercicios.id_trophy = ks_rel_trophy.id_trophy 
						INNER JOIN ks_valor_trophy ON ks_exercicios.valor_trophy= ks_valor_trophy.id_valor_t						
						WHERE ks_rel_trophy.id_user = '$sql_user_sel' AND ks_exercicios.id_disciplina = '$id_disciplina_sel' AND ks_exercicios.valor_trophy = '$arr_count'");
					
					$sql_trophy_icon = mysqli_query($conectar, "Select img_valor_t from ks_valor_trophy WHERE id_valor_t = '$arr_count'");

					$dt = mysqli_fetch_row($sql_trophy_icon);
					$icon_t = $dt[0];
					

					$icon_trophy[$arr_count] = $icon_t;
					$qtd_trophy[$arr_count] = mysqli_num_rows($sql_trophy_qtd);				
				}	

				
				
			}
			?>
			<table border="0" align="left" style="float: none;">
				<tr>		
				
				<td>
					<div class="trophy">
						<div class="trophy_img">
							<img width="30" src="/klasstation/<?php echo $icon_trophy[1];?>" />                    
						</div>
						<div class="info_trophy">
							<?php echo $qtd_trophy[1]; ?>
						</div>
					</div>
					<div class="trophy">
						<div class="trophy_img">
							<img width="30" src="/klasstation/<?php echo $icon_trophy[2];?>" />                                       
						</div>
						<div class="info_trophy">
							<?php echo $qtd_trophy[2]; ?>
						</div>
					</div>
					<div class="trophy">
						<div class="trophy_img">
							<img width="30" src="/klasstation/<?php echo $icon_trophy[3];?>" />                                       
						</div>
						<div class="info_trophy">
							<?php echo $qtd_trophy[3]; ?>
						</div>
					</div>
					<div class="trophy">
						<div class="trophy_img">
							<img width="30" src="/klasstation/<?php echo $icon_trophy[4];?>" />                                       
						</div>
						<div class="info_trophy">
							<?php echo $qtd_trophy[4]; ?>
						</div>
					</div>
				</td>
				
				</tr>

			</table></div>
		
	</div>
</div>
<div class="topdir_exc">
<?php 
if($has_perm == true){
	?>

	<!--<div id="new_conquista" class="btn_nova_conquista">Adicionar exercício</div>-->
	
	<div style="height: 20px; width: 100%;"><div class="btn_nova_conquista"><a href="/klasstation/disciplina/r_exercicio/<?php echo $id_turma; ?>/<?php echo $id_disciplina_sel; ?>/1">Adicionar Exercício</a></div></div>

	
<?php } ?>
</div>
</div>
<div class="prog_ex">
			<?php criaProg($id_disciplina_sel, $id_logado_s); //print_r(criaProg($id_disciplina_sel));?>
		</div>

		<div class="lista_trophy_turma">

			<div class="escopo_trophy">
				<?php 

				$sql_conquistas = mysqli_query($conectar, "Select * from ks_exercicios
					INNER JOIN ks_valor_trophy ON ks_exercicios.valor_trophy = ks_valor_trophy.id_valor_t
					WHERE id_disciplina = '$id_disciplina_sel'");
				while($dados_conquistas = mysqli_fetch_assoc($sql_conquistas))
				{

					$id_trophy = $dados_conquistas['id_trophy'];
					$titulo_c = $dados_conquistas['titulo_trophy'];
					$descr_c = $dados_conquistas['descr_trophy'];
					$desafio_c = $dados_conquistas['desafio_trophy'];
					$valor = $dados_conquistas['img_valor_t'];

					if($has_perm == true){

						$tr_user = $user_selected;

								/*if(@!$user_selected)
							{
								$tr_user = $id_logado_s;	
							}
							else
							{
								$tr_user = $user_selected;
							}*/

						}
						else{
							$tr_user = $id_logado_s;
						}
						

								$lvl_perm = "enabled"; // Caso o usuário não tenha level, a conquista não é liberada
								?>
								
								
								<a class="link_ex" href="<?php echo "/klasstation/disciplina/r_exercicio/$id_turma/$id_disciplina/0/$id_trophy" ?>">
								<div class="escopo_trophy">
									<div class="linha_trophy" <?php //echo $lvl_perm;?> >
										<?php
										$sql_rel_conquistas = mysqli_query($conectar, "Select * from ks_rel_trophy
											WHERE id_trophy = '$id_trophy' AND id_user = '$tr_user'");
										
											$verif_conq_user = mysqli_num_rows($sql_rel_conquistas);
											$resolvido  = false;
											if($verif_conq_user == 0)
											{

												

												echo '<div class="icon_trophy"> <img src="/klasstation/imagens/tp_hidden.png" /> </div>';

												
											}
											else
											{
												$resolvido = true;
												while($dados_rel_c = mysqli_fetch_assoc($sql_rel_conquistas))
												{
													$data_conq = $dados_rel_c['data_rel_trophy'];

													?>
													<div class="icon_trophy"> <img src="/klasstation/<?php echo $valor; ?>" /> </div>
													<?php
												}	
											}
										

										?>

										<div class="dados_conq">
											<div class="titulo_conq"> <?php echo $titulo_c; ?> </div>
											<div class="descr_conq"> <?php echo $descr_c; ?> </div>
											<!--<div class="collapse" id="conquista<?php echo $id_trophy;?>">
												<div class="card card-body">
													<?php echo $desafio_c; ?>
												</div>
												<div class="responder" id="responder">
													<?php 
													?>
														<a href="<?php echo "/klasstation/disciplina/r_exercicio/$id_turma/$id_disciplina/0/$id_trophy" ?>"><?php if($resolvido){echo 'Verificar resposta';}else{ echo 'Responder'; } ?></a>
													</form>	
												</div>
												
											</div> -->
										</div>

										<div class="info_conq">
											<div class="dados_exer_dir"> 
												<div style="margin-right: 5px;">
												<div style="font-size: 12px; line-height: 2.2;"><?php $sql_exFeito = mysqli_query($conectar, "Select * from ks_rel_trophy
													WHERE id_trophy = '$id_trophy'");
												$n_linhas_exFeito = mysqli_num_rows($sql_exFeito);

												$sql_alunos = mysqli_query($conectar, "Select * from ks_usuarios
													INNER JOIN ks_rel_disciplinas on ks_usuarios.id_user = ks_rel_disciplinas.id_usuario
													WHERE tipo_user = '1' AND ks_rel_disciplinas.id_disciplina = '$id_disciplina_sel'");
												$n_alunos_sys = mysqli_num_rows($sql_alunos);

												@$porc_exFeito = ($n_linhas_exFeito * 100) / $n_alunos_sys;

												echo number_format($porc_exFeito, 1)."%";
												?>

												
												</div>
												<!-- <?php if($verif_conq_user != 0){

												}
												else
													{ ?>

														<form method="post" id="sbmt<?php echo $id_trophy; ?>" action="/klasstation/scripts/sct_give_conq.php" name="sbmt<?php echo $id_trophy; ?>">
															<input type="hidden" name="id_user" value="<?php echo $tr_user; ?>" />
															<input type="hidden" name="id_trophy" value="<?php echo $id_trophy; ?>" />  
															<input type="hidden" name="id_disciplina" value="<?php echo $id_disciplina_sel; ?>" />            
															<input type="button" <?php echo $lvl_perm;?> id="sbmt<?php echo $id_trophy; ?>" name="sbmt<?php echo $id_trophy; ?>" value="+" onclick="give_trophy(<?php echo $tr_user; ?>, <?php echo $id_trophy; ?>, <?php echo "'sbmt".$id_trophy."'"; ?>)" />
														</form>

												<?php } ?> -->
													</div>
												</div>

											</div>
										</div>
									</a>
										<?php


									}
									?>

								</div>

								<p>