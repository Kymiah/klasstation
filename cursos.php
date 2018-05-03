    <?php session_start();
$id_logado_s = $_SESSION['id_user'];
$instituicao = "1";
?>
<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KlasStation</title>


<link rel="stylesheet" href="css/turmas.css"/>
<link rel="stylesheet" href="css/topo.css"/>
<link rel="stylesheet" href="css/menu_lado.css"/>
<link rel="stylesheet" href="css/cursos.css"/>

<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="scripts/jquery_blockui.js"></script>
</head>


<script>
   
$(document).ready(function() { 
            $('#new_course').click(function() { 
                $.blockUI({ message: $('#question'), css: { width: '370px', height: '400px' },
                onOverlayClick: $.unblockUI }); 
            }); 
             });

</script>

<body>
<div class="geral">
    <div class="topo">
        <div class="bar_top_index">
            <!-- includes -->
        </div>
        <div class="fundo_topo_index">
            <div class="infos_topo">
                <?php include("includes/dados_topo.php"); ?>
            </div>
            <!-- <div class="menu_topo">
                <?php include("includes/menu_topo.php"); ?>
            </div> 
            -->
           

            
        </div>
        
        <div class="bar_b_top_index">
        
        </div>
    </div>

    <div class="menu_lado">

                    <div class="trofeis_topo">
                    <?php include("includes/trophys_topo.php"); ?>
                    </div>

                <?php include("includes/menu_lado.php"); ?>
    </div>

    <div class="centro">
        <div class="topo_centro">
            
        </div>
        <div class="titulo_centro">
            
            
                <span class="titulo_cursos">Cursos</span> <g id="new_course" class="btn_novo_curso">+</g>

                <div id="question" style="display:none; cursor: default" class="form_acess_turma"> 
                            Novo curso <p>
                    <form name="novo_curso" method="post" action="scripts/scr_querys.php" align="center">

                        <table align="center" >
                            <tr>
                                <td align="left">Nome do curso:</td>
                                <td><input type="text" size="20" name="curso_nome" /></td>
                            </tr>
                            <tr>
                                <!-- <td>Descrição:</td>
                                <td><input type="text" size="20" name="descr_trophy" /></td> -->
                            </tr>
                            <tr><td align="left" height="40px">Selecione o ícone:</td></tr><tr> <td width="80px" colspan="2"> 
                   <label><input type="radio" name="curso_icon" value="imagens/icon_turmas/ti_icon.png" /><img src="imagens/icon_turmas/ti_icon.png" width="50"></label>
                   <label><input type="radio" name="curso_icon" value="imagens/icon_turmas/foto_icon.png" /><img src="imagens/icon_turmas/foto_icon.png" width="50"></label>
                   <label><input type="radio" name="curso_icon" value="imagens/icon_turmas/design_icon.png" /><img src="imagens/icon_turmas/design_icon.png" width="50"></label>
                   <label><input type="radio" name="curso_icon" value="imagens/icon_turmas/cad_icon.png" /><img src="imagens/icon_turmas/cad_icon.png" width="50"></label>
                   <label><input type="radio" name="curso_icon" value="imagens/icon_turmas/admin_icon.png" /><img src="imagens/icon_turmas/admin_icon.png" width="50"></label>
                   <label><input type="radio" name="curso_icon" value="imagens/icon_turmas/contabil_icon.png" /><img src="imagens/icon_turmas/contabil_icon.png" width="50"></label>
                   <label><input type="radio" name="curso_icon" value="imagens/icon_turmas/hardware_icon.png" /><img src="imagens/icon_turmas/hardware_icon.png" width="50"></label>
                   <label><input type="radio" name="curso_icon" value="imagens/icon_turmas/wifi_icon.png" /><img src="imagens/icon_turmas/wifi_icon.png" width="50"></label>
                   <label><input type="radio" name="curso_icon" value="imagens/icon_turmas/logistica_icon.png" /><img src="imagens/icon_turmas/logistica_icon.png" width="50"></label>
                   
                    </td> </tr>
                        </table>
            
           
                    <input type="hidden" name="id_instituicao" value="<?php echo $instituicao; ?>" /><p>
                    <input type="hidden" name="type" value="curso" /><p>
                    <input type="submit" id="btn_acessar" value="Criar" />
                    </form>
            
                    </div> 
            
        </div>
        
        
        <!-- ### PAINEL COM OS ITENS #### -->       
            <div class="pn_geral_cursos">
                 <?php 
                        

                        $sql_t = mysqli_query($conectar, "Select * from ks_cursos WHERE id_instituicao = '$instituicao'");
                    
                    while($dados_t = mysqli_fetch_assoc($sql_t))
                    {
                        $id_curso = $dados_t['id_curso'];                       
                        $curso_nome = $dados_t['curso_nome'];   
                        $curso_icone = $dados_t['curso_icone'];   
                        $curso_senha = $dados_t['curso_senha'];                        
                        
                    
                        ?>
                    <div class="pn_curso">
                    <a href="scripts/scr_access.php?type=curso&id_curso=<?php echo $id_curso; ?>" >
                        <table >                       
                        <tr><td height="80px" style="border-bottom: 1px solid #000000"><div class="pn_curso_icon"><img src="<?php echo $curso_icone; ?>"></div></td></tr>
                        <tr><td height="40px" width="100px" valign="middle"><div class="pn_curso_titulo"><?php echo $curso_nome; ?></div></td></tr> </table>
                    </a></div>
                   <?php } ?>
                    </div>
            </div>

        <!-- ### PAINEL DE PRÉ-VISUALIZAÇÃO #### -->
            

       
    
    </div>

</div>
</body>
</html>