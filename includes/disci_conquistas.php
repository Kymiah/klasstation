<script src="jquery/bootstrap/bootstrap.js"></script>
<div class="menu_topo_direita_turma">

				<div id="new_conquista" class="btn_nova_conquista">Adicionar conquista</div>

				<div id="question" style="display:none; cursor: default" class="form_acess_turma"> 
					Nova conquista <p>
						<form name="nova_conquista" method="post" action="scripts/scr_new_trophy.php" align="center">

							<table align="center" >
								<tr>
									<td align="right">Título:</td>
									<td><input type="text" size="20" name="titulo_trophy" /></td>
								</tr>
								<tr>
									<td>Objetivo:</td>
									<td><input type="text" size="20" name="descr_trophy" /></td>
								</tr>
								<tr>
									<td>Desafio:</td>
									<td><input type="text" size="20" name="desafio_trophy" /></td>
								</tr>
								<tr>
									<td align="right">  Valor: </td> 
									<td>
										<select  name="valor_trophy" > 
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

										</select>
									</td>
								</tr>
							</table>


							<input type="hidden" name="id_disci_trophy" value="<?php echo $id_disciplina_sel; ?>" /><p>
								<input type="submit" id="btn_acessar" value="Criar" />
							</form>

				</div> 
				</div>
					<div class="lista_trophy_turma">
					
						<div class="linha_trophy">
							<?php 

							$sql_conquistas = mysqli_query($conectar, "Select * from ks_trophy
								INNER JOIN ks_valor_trophy ON ks_trophy.valor_trophy = ks_valor_trophy.id_valor_t
								WHERE id_disciplina = '$id_disciplina_sel'");
							while($dados_conquistas = mysqli_fetch_assoc($sql_conquistas))
							{

								$id_trophy = $dados_conquistas['id_trophy'];
								$titulo_c = $dados_conquistas['titulo_trophy'];
								$descr_c = $dados_conquistas['descr_trophy'];
								$desafio_c = $dados_conquistas['desafio_trophy'];
								$valor = $dados_conquistas['img_valor_t'];

								if(@!$user_selected)
								{
									$tr_user = $id_logado_s;	
								}
								else
								{
									$tr_user = $user_selected;
								}

								$lvl_perm = "enabled"; // Caso o usuário não tenha level, a conquista não é liberada
								?>
								
								

								<div class="escopo_trophy">
								<button <?php echo $lvl_perm;?> type="button" data-toggle="collapse" data-target="#conquista<?php echo $id_trophy;?>" aria-expanded="false" aria-controls="conquista">
								 <?php
								$sql_rel_conquistas = mysqli_query($conectar, "Select * from ks_rel_trophy
									WHERE id_trophy = '$id_trophy' AND id_user = '$tr_user'");
								{
									$verif_conq_user = mysqli_num_rows($sql_rel_conquistas);
									if($verif_conq_user == 0)
									{
										?>

										<div class="icon_trophy"> <img src="imagens/tp_hidden.png" /> </div>

										<?php
									}
									else
									{
										while($dados_rel_c = mysqli_fetch_assoc($sql_rel_conquistas))
										{
											$data_conq = $dados_rel_c['data_rel_trophy'];

											?>
											<div class="icon_trophy"> <img src="<?php echo $valor; ?>" /> </div>
											<?php
										}	
									}
								}

								?>
								
								<div class="dados_conq">
									<div class="titulo_conq"> <?php echo $titulo_c; ?> </div>
									<div class="descr_conq"> <?php echo $descr_c; ?> </div>
									<div class="collapse" id="conquista<?php echo $id_trophy;?>">
										<div class="card card-body">
											<?php echo $desafio_c; ?>
										</div>
										
									</div>
								</div>

								<div class="info_conq">
									<div class="btn_give_conq"> 
										<?php if($verif_conq_user != 0){

										}
										else
											{ ?>

												<form method="post" id="sbmt<?php echo $id_trophy; ?>" action="scripts/sct_give_conq.php" name="sbmt<?php echo $id_trophy; ?>">
													<input type="hidden" name="id_user" value="<?php echo $tr_user; ?>" />
													<input type="hidden" name="id_trophy" value="<?php echo $id_trophy; ?>" />  
													<input type="hidden" name="id_disciplina" value="<?php echo $id_disciplina_sel; ?>" />            
													<input type="button" <?php echo $lvl_perm;?> id="sbmt<?php echo $id_trophy; ?>" name="sbmt<?php echo $id_trophy; ?>" value="+" onclick="give_trophy(<?php echo $tr_user; ?>, <?php echo $id_trophy; ?>, <?php echo "'sbmt".$id_trophy."'"; ?>)" />
												</form>

												<?php } ?>
											</div>
										</div>
										
									</div>
									</button>
									<?php


								}
								?>

							</div>

							<p>
  
  

						</div>