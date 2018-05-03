<?php @session_start(); ?>

  <script type="text/javascript" src="/klasstation/jquery/jquery.js"></script>
  
	
	<script type="text/javascript"> 
    /*$(document).ready(function() { 
 
        $('#change_avt').click(function() { 
            $.blockUI({ 
			message: $('#div_change_avt'), 
			css: { width: '800', height: '500', top: '20%', left: '20%' },
			onOverlayClick: $.unblockUI
			 }); 
        }); 
    }); */


</script>
<?php 
					include('scripts/connect.php');
					
					$id_user = $_SESSION['id_user'];
          
                   		$sql_u = mysqli_query($conectar, "Select * from ks_usuarios where id_user = '$id_user'");
					while($dados_u = mysqli_fetch_assoc($sql_u))
					{
						$avatar_user = $dados_u['avatar_user'];
					}

          $avatar = explode(",", $avatar_user)

          ?> 

          <div class="infos_topo">
           <a href="/klasstation/avatar.php" ><div class="img_avatar_topo"> 

           <img style="image-rendering: pixelated; margin-left: -1px; margin-top: -1px;" src="/klasstation/<?php echo $avatar_user; ?>" width="40"/>
                
                      <div id="div_change_avt" style="display:none;">                      
                      
                       </div>
                </div></a>
                
                <div class="dados_pessoais">
                	<div class="nome_topo">
                    <?php echo $_SESSION['nome_user']." - <a href=\"/klasstation/scripts/scr_logout.php\"> X </a>"; ?>
                    </div>
                    <div class="turma_topo">
                    	Level 1
                    </div>
                </div>
            </div>
            
           

           