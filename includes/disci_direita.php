<div class="direita_perfil">

<div class="menu_topo_direita_turma">
	<?php
	//var_dump($_REQUEST);
	if($menu_sel == "exercicios"){ // Lista de exercícios
		include("includes/disci_exercicios.php");
	}

	if($menu_sel == "planoaula"){ // Plano de aula
		include("includes/disci_planoaula.php");
	}

	if($menu_sel == "r_exercicio"){ // Resolução de exercícios

		include("includes/disci_exercicios_resp.php");
	}
	?>



</div>
</div>






<!-- VERIFICA OS TROFÉIS RECEBIDOS -->
<?php 

$sql_tr = mysqli_query($conectar, "Select * from ks_rel_trophy
				INNER JOIN ks_exercicios
				ON ks_rel_trophy.id_trophy = ks_exercicios.id_trophy
	    		WHERE ks_rel_trophy.id_user = '$id_user' AND ks_rel_trophy.id_disciplina = '$id_disciplina' AND visualizado = '0'");
			$numlinhas = mysqli_num_rows($sql_tr);
			if($numlinhas > 0){
					 ?>

	    		<script type="text/javascript">
    $(window).on('load',function(){
        $('#exampleModal').modal('show');
    });
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="text-align: center; width: 100%;"><?php echo "Parabéns, ".$_SESSION['nome_user']."!"; ?></h5>
        
      </div>
      <div class="modal-body" style="margin-left: auto; margin-right: auto;">
        <?php 			

        while($dados_tr = mysqli_fetch_assoc($sql_tr))
	    			{	$id_trophy_l = $dados_tr['id_trophy'];
	    				$trophy_value = $dados_tr['valor_trophy'];

	    				if($trophy_value == '1'){ echo "<img src=\"/klasstation/imagens/trophy_b.gif\">"; }
	    				if($trophy_value == '2'){ echo "<img src=\"/klasstation/imagens/trophy_p.gif\">"; }
	    				if($trophy_value == '3'){ echo "<img src=\"/klasstation/imagens/trophy_g.gif\">"; }
	    				if($trophy_value == '4'){ echo "<img src=\"/klasstation/imagens/trophy_pl.gif\">"; }

	    				$sql_upd_t = mysqli_query($conectar, "UPDATE ks_rel_trophy SET visualizado = '1' WHERE id_trophy = '$id_trophy_l'");

	    			} ?>
	    				
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
	<?php		} ?>
			
