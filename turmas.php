<?php session_start();
/*criptografia da url*/
         include("scripts/scr_cript.php");          
    /***********************/
$id_logado_s = $_SESSION['id_user'];
$id_curso_sel = $_REQUEST['id_curso'];

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
            
            
                <span class="titulo_cursos">Turmas</span> <g id="new_course" class="btn_novo_curso">+</g>

                <div id="question" style="display:none; cursor: default" class="form_acess_turma"> 
                            Nova turma <p>
                    <form name="nova_turma" method="post" action="scripts/scr_querys.php" align="center">

                        <table align="center" border="0" style="table-layout: fixed; width: 290px;">
                            <tr>
                                <td align="left">Nome da turma:</td>
                                <td><input type="text" size="20" name="turma_nome" /></td>
                            </tr>
                             <tr><td align="left">  Ciclo: </td> <td><select  name="turma_ciclo" >
                                <option value="1"> 1º Ciclo </option>
                                <option value="2"> 2º Ciclo </option>
                                <option value="3"> 3º Ciclo </option>
                                <option value="4"> 4º Ciclo </option>
                                <option value="5"> 5º Ciclo </option>
                                <option value="6"> 6º Ciclo </option>
                                </select></td> </tr>
                            <tr>
                                <tr><td align="left"> Período: </td> 
                                <td width="70px" > <input type="radio" name="turma_periodo" value="matutino"> Matutino </td>
                                <td> <input type="radio" name="turma_periodo" value="noturno"> Noturno </td>
                                
                            </tr>
                           
                        </table>
            
           
                    <input type="hidden" name="id_curso" value="<?php echo $id_curso_sel?>" /><p>
                    <input type="hidden" name="type" value="turma" /><p>
                    <input type="submit" id="btn_acessar" value="Criar" />
                    </form>
            
                    </div> 
            
        </div>
        
        
        <!-- ### PAINEL COM OS ITENS #### -->       
            <div class="pn_geral_cursos">
                 <?php 
                        

                        $sql_t = mysqli_query($conectar, "Select * from ks_turmas INNER JOIN ks_cursos ON ks_turmas.id_curso = ks_cursos.id_curso WHERE ks_turmas.id_curso = '$id_curso_sel'");
                    
                    while($dados_t = mysqli_fetch_assoc($sql_t))
                    {
                        $id_turma = $dados_t['id_turma'];                       
                        $turma_nome = $dados_t['turma_nome'];   
                        $turma_periodo = $dados_t['turma_periodo'];   
                        $turma_ciclo = $dados_t['turma_ciclo']; 
                        $curso_icone = $dados_t['curso_icone']                       
                        
                    
                        ?>
                    <div class="pn_curso"> 
                        <a href="scripts/scr_access.php?type=turma&id_turma=<?php echo $id_turma; ?>" >
                        <table >                       
                        <tr><td height="80px" style="border-bottom: 1px solid #000000"><div class="pn_curso_icon"><img src="<?php echo $curso_icone; ?>"></div></td></tr>
                        <tr><td height="20px" width="100px" valign="middle"><div class="pn_curso_titulo"><?php echo $turma_nome; ?></div></td></tr>
                        <tr><td height="20px" width="100px" valign="middle"><div class="pn_curso_titulo"><?php echo $turma_periodo." - ".$turma_ciclo."º ciclo"; ?></div></td></tr>
                    </table></div>
                   <?php } ?>
                    </div>
            </div>

        <!-- ### PAINEL DE PRÉ-VISUALIZAÇÃO #### -->
            

       
    
    </div>

</div>
</body>
</html>