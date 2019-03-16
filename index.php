<?php session_start();
                    /*criptografia da url*/
                      include("scripts/scr_cript.php");      
                    /***********************/
                    
$id_logado_s = $_SESSION['id_user'];
?>
<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KlasStation</title>
<link rel="stylesheet" href="css/index.css"/>
<link rel="stylesheet" href="css/menu_lado.css"/>
<link rel="stylesheet" href="css/topo.css"/>

</head>

<body>
<div class="geral">
        <div class="topo">
            <div class="bar_top_index">
                <!-- ### INCLUDES ### -->
            </div>
            <div class="fundo_topo_index">
                <div class="infos_topo">
                    <?php include("includes/dados_topo.php"); ?>
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

                    <div class="trofeis_topo">
                    <?php include("includes/trophys_topo.php"); ?>
                    </div>

                <?php include("includes/menu_lado.php"); ?>
                </div>
    
</div>
</body>
</html>

oi
