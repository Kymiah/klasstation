
<script type="text/javascript" src="/klasstation/jquery/bootstrap/bootstrap.js"></script>
<link rel="stylesheet" href="/klasstation/css/functions.css"/>
<script type="text/javascript" src="/klasstation/scripts/calendario.js"></script>

<?php include("includes/calendario.php"); ?>

<div class="centro_perfil_turma">
	<div class="esquerda_perfil_turma">									

		<div class="esquerda_perfil_user">
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
			<table border="0" align="left">
				<tr><td colspan="2" style="font-size: 12px;">Seu progresso nessa disciplina:</td></tr><tr>
					<td rowspan="2" style="width: 60px;"><div class="img_aluno_turma" ><img width="40" style="image-rendering: pixelated; margin-top: -1px; margin-left: -1px;" src="/klasstation/<?php echo $avatar_user; ?>" /></div></td>
					
				</tr>
				
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
				<tr>
				</tr>

			</table>


		</div>



	 <!-- ########### INDICADORES ############ --> <!--

	    	<div class="esquerda_perfil_turma">
	        <table border="0" align="left" class="table_indicadores">
	        <?php 
			if(@!$_REQUEST['user_selected']){
				$sql_indicadores = mysqli_query($conectar, "Select * from ks_rel_indicadores WHERE ri_id_turma = '$id_turma' AND ri_id_aluno = '$id_user'");
			}
			else
			{
				$aluno_selected = $_REQUEST['user_selected'];
				$sql_indicadores = mysqli_query($conectar, "Select * from ks_rel_indicadores WHERE ri_id_turma = '$id_turma' AND ri_id_aluno = '$aluno_selected' ");
			}

					   while($indicadores = mysqli_fetch_assoc($sql_indicadores))
			{	
				$id_rel_ind = $indicadores['id_ri'];
				$id_indicador = $indicadores['ri_id_ind'];
				$ri_exp = $indicadores['ri_exp'];
				$ri_next_exp = $indicadores['ri_next_exp'];
				$ri_level = $indicadores['ri_level'];
				
				$percent_exp = ($ri_exp * 100) / $ri_next_exp;
				
				$sql_nome_ind = mysqli_query($conectar, "Select nome_indicador from ks_indicadores WHERE id_indicador = '$id_indicador'");
					   while($indicadores = mysqli_fetch_assoc($sql_nome_ind))
			{	
				$ri_nome_indicador = $indicadores['nome_indicador'];
			}
				//verificar se é professor ou aluno na turma
				
				$sql_verif_user = mysqli_query($conectar, "Select * from ks_rel_turmas WHERE id_turma = '$id_turma' AND id_user = '$id_logado_s'");
				while($verif_user = mysqli_fetch_assoc($sql_verif_user))
			{
				$tipo_rel_logado = $verif_user['tipo_rel'];	
			}
	        echo "
	        		<tr height=\"32\" class=\"row_indicadores\">
	        			<td width=\"160px\" class=\"lbl_indicador\">".$ri_nome_indicador.":</td>
	        			<td><div class=\"bar_bg_stats\"> <div style=\"width:".$percent_exp."%;\"class=\"bar_preench_stats\"></div> </div></td>";
	        echo "		<td><div class=\"lbl_lvl_stats\">Lv ".$ri_level."</div></td>";
	        if($tipo_rel_logado == 0){
						?> <td >
			            <form method="post" action="scripts/sct_increase_indicador.php">
			            <input type="submit" class="btn_add_stat" value="+" />
			            <input type="hidden" name="id_turma" value="<?php echo $id_turma; ?> " />
			            <input type="hidden" name="id_user" value="<?php echo $aluno_selected; ?> " />
			            <input type="hidden" name="id_indicador" value="<?php echo $id_indicador; ?> " />
			            </form></td>
	            <?php
			}
			
	        echo "</tr>";
			} ?>
		-->
		<!-- ####################### -->

		<!-- ###### LISTA DE ALUNOS ########## -->

	</table>
	<div class="painel_alunos_turma"> 
		<span class="titulo_painel_alunos_turma">Alunos:</span>
		<div class="painel_img_alunos">
			<?php  $sql_alunos_turma = mysqli_query($conectar, "Select * from ks_rel_disciplinas
				INNER JOIN ks_usuarios ON ks_rel_disciplinas.id_usuario = ks_usuarios.id_user
				WHERE id_disciplina = '$id_disciplina_sel' AND ks_rel_disciplinas.rel_disc_nivel = '0' AND id_user != '$id_user' ");
			while($alunos_turma = mysqli_fetch_assoc($sql_alunos_turma))
			{	
				$id_aluno = $alunos_turma['id_user'];
				$img_user = $alunos_turma['avatar_user'];
				$nome_user = $alunos_turma['nome_user']." ".$alunos_turma['sobrenome_user'];

										/* ######## Criptografar dados que serão transmitidos ######								
										$uc = $id_turma_sel."/".$id_disciplina."/".$id_aluno."/".$menu_sel;
   										$url_cript = url_encrypt($uc, $pass_cript);
										########################################################### */

   										?>

   										<a href="/klasstation/perfil_disciplina.php?url=<?php // echo $url_cript;?>" class="tooltip_aluno">
   											<?php if(@$id_aluno == @$aluno_selected)
   											{ ?>
   												<div class="img_aluno_turma_s" ><img style="image-rendering: pixelated; margin-left: -1px; margin-top: -1px;" src=/klasstation/"<?php echo $img_user; ?>" width="40"/>  </div>
   												<?php 
   											}
   											else{ ?>
   											<div class="img_aluno_turma" ><img style="image-rendering: pixelated; margin-left: -1px; margin-top: -1px;" src="/klasstation/<?php echo $img_user; ?>" width="40"/>   </div>
   											<?php } ?>
   											<span><?php echo $nome_user; ?></span></a> </a>

   											<?php } ?>
   											<!-- ####################### -->

   										</div>                
   									</div>   </div>
   									<div class="feed_perfil_turma">oe</div>

   									<div class="direita_perfil_turma">
   										<div class="calendario">

   											<?php  
   											$info =array(
   												'data' => 'data_calevento',
   												'titulo' => 'titulo_calevento',
   												'disciplina' => $id_disciplina_sel
   											);

   											$eventos = montaEventos($info);



   											print_r(montaCalendario($eventos)); ?>

   										</div>
   									</div>

