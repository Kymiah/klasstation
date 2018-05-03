<?php /*session_start();
$id_logado_s = $_SESSION['id_user'];*/

/*criptografia da url*/
         include("scripts/scr_cript.php");          
    /***********************/
?>




<head>

<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KlasStation</title>


<link rel="stylesheet" href="css/turmas.css"/>
<link rel="stylesheet" href="css/topo.css"/>
<link rel="stylesheet" href="css/menu_lado.css"/>
<link rel="stylesheet" href="css/avatar.css"/>

<script>

    function setAttributes(hueVal, satVal, conVal) {
        var sethueAs = hueVal + "deg";
        var setsatAs = satVal + "%";
        var setconAs = conVal + "%";
        Object.assign(document.getElementById("hair_img").style,{filter:"hue-rotate(" + sethueAs + ") saturate(" + setsatAs + ")" });

  }



/*
function hueFunction(hueVal) {
var sethueAs = hueVal + "deg"
document.getElementById("box_hair").setAttribute("style", "-webkit-filter:hue-rotate(" + sethueAs + ")")
}

function satFunction(satVal) {
var setsatAs = satVal + "%"
document.getElementById("box_hair").setAttribute("style", "-webkit-filter:saturate(" + setsatAs + ")")
}*/
                </script>
               

                <script type="text/javascript" src="/klasstation/scripts/zjg3kun.js"></script>
                <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.19/angular.min.js" type="text/javascript"></script> -->
<script src="/klasstation/scripts/html2canvas.min.js"></script>
<script src="/klasstation/scripts/screenshot/src/index.js"></script>

</head>



<script>
     function download(url, fullName) {
  const anchor = document.createElement('a')
  anchor.href = url
  anchor.setAttribute('download', fullName)

  anchor.click();
}


    function sendAvatar(){        
        html2canvas(document.querySelector("#avatar")).then(canvas => {
    //document.body.appendChild(canvas);
    var imgData = canvas.toDataURL('image/jpeg');
     var url = 'scripts/scr_avatar.php';
        $.ajax({ 
            type: "POST", 
            url: url,
            dataType: 'text',
            data: {
                base64data : imgData
            }
        });

location.reload();

});

        
}

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
            
            
                <span class=\"titulo1\">Avatar</span> <a href=\"form_nova_turma.php\"></a><br />
            
        </div>
        
        
        <!-- ### PAINEL COM OS ITENS #### -->       
            <div class="pn_itens_avatar">
                <div class="pn_itens_s">
                     <?php  $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_cat_avatar = '0'");                    
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $background = $dados_a['link_avatar']; $id_avatar = $dados_a['id_avatar']; 
                    $uc = $id_avatar."/"."0"; ?>

                    <div class="bg_box"><a href="scripts/scr_avatar.php?url=<?php echo url_encrypt($uc, $pass_cript); ?>">
                        <img width="35" style="image-rendering: pixelated;" src="<?php echo $background; ?>"></a></div> <?php } ?>                    
                </div>

                <div class="pn_itens_s">
                    <?php  $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_cat_avatar = '1'");                    
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $skin = $dados_a['link_avatar']; $id_avatar = $dados_a['id_avatar'];
                    $uc = $id_avatar."/"."1"; ?>
                    
                    <div class="bg_box"><a href="scripts/scr_avatar.php?url=<?php echo url_encrypt($uc, $pass_cript); ?>">
                        <img width="35" style="image-rendering: pixelated;" src="<?php echo $skin; ?>"></a></div> <?php } ?>
                </div>

                <div class="pn_itens_s">
                    <?php  $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_cat_avatar = '2'");                    
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $hair = $dados_a['link_avatar']; $id_avatar = $dados_a['id_avatar'];
                    $uc = $id_avatar."/"."2"; ?>
                    
                    <div class="bg_box"><a href="scripts/scr_avatar.php?url=<?php echo url_encrypt($uc, $pass_cript); ?>">
                        <img width="35" style="image-rendering: pixelated;"  src="<?php echo $hair; ?>"></a></div> <?php } ?>
                </div>

                <div class="pn_itens_s">
                    <?php  $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_cat_avatar = '3'");                    
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $eyes = $dados_a['link_avatar']; $id_avatar = $dados_a['id_avatar']; 
                    $uc = $id_avatar."/"."3"; ?>
                    
                    <div class="bg_box"><a href="scripts/scr_avatar.php?url=<?php echo url_encrypt($uc, $pass_cript); ?>">
                        <img width="35" style="image-rendering: pixelated;"  src="<?php echo $eyes; ?>"></a></div> <?php } ?>
                </div>

                <div class="pn_itens_s">
                    <?php  $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_cat_avatar = '4'");                    
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $mouth = $dados_a['link_avatar']; $id_avatar = $dados_a['id_avatar']; 
                    $uc = $id_avatar."/"."4"; ?>
                    
                    <div class="bg_box"><a href="scripts/scr_avatar.php?url=<?php echo url_encrypt($uc, $pass_cript); ?>">
                        <img width="35" style="image-rendering: pixelated;"  src="<?php echo $mouth; ?>"></a></div> <?php } ?>
                </div>

                <div class="pn_itens_s">
                    <?php  $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_cat_avatar = '5'");                    
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $cloth = $dados_a['link_avatar']; $id_avatar = $dados_a['id_avatar']; 
                    $uc = $id_avatar."/"."5"; ?>
                    
                    <div class="bg_box"><a href="scripts/scr_avatar.php?url=<?php echo url_encrypt($uc, $pass_cript); ?>">
                        <img width="35" style="image-rendering: pixelated;"  src="<?php echo $cloth; ?>"></a></div> <?php } ?>
                </div>
            </div>

        <!-- ### PAINEL DE PRÉ-VISUALIZAÇÃO #### -->
            <div id="avatar"  class="pn_visualizar_avatar">
                <div class="pn_itens_v">
                      <?php 
                      $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_avatar = '".$_SESSION['av_cat_id_0']."'");                    
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $background = $dados_a['link_avatar']; ?>

                    <div class="bg_box"><img  src="<?php echo $background; ?>"></div> <?php } ?>
                </div>

                <div class="pn_itens_v">
                    <?php  $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_avatar = '".$_SESSION['av_cat_id_1']."'");              
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $skin = $dados_a['link_avatar']; ?>

                    <div class="bg_box"><img  src="<?php echo $skin; ?>"></div> <?php } ?>
                </div>

                <div class="pn_itens_v">
                    <?php  $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_avatar = '".$_SESSION['av_cat_id_3']."'");                    
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $eyes = $dados_a['link_avatar']; ?>

                    <div class="bg_box"><img  src="<?php echo $eyes; ?>"></div> <?php } ?>
                </div>

                <div class="pn_itens_v">
                     <?php  $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_avatar = '".$_SESSION['av_cat_id_4']."'");                    
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $mouth = $dados_a['link_avatar']; ?>

                    <div class="bg_box"><img  src="<?php echo $mouth; ?>"></div> <?php } ?>
                </div>

                <div class="pn_itens_v">
                     <?php  $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_avatar = '".$_SESSION['av_cat_id_5']."'");                    
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $cloth = $dados_a['link_avatar']; ?>

                    <div class="bg_box"><img  src="<?php echo $cloth; ?>"></div> <?php } ?>
                </div>
               
                <div class="pn_itens_v" >
                    <?php 

                    if(@!$_SESSION['hair_temp']){ $sql_a = mysqli_query($conectar, "Select * from ks_itens_avatar where id_avatar = '".$_SESSION['av_cat_id_2']."'");                    
                    while($dados_a = mysqli_fetch_assoc($sql_a))  { $hair = $dados_a['link_avatar']; ?>

                    <div class="bg_box" id="box_hair"><img id="hair_img"  src="<?php echo $hair; ?>"></div> <?php } }
                    else{ ?>
                    <div class="bg_box" id="box_hair"><img id="hair_img"  src="<?php echo $_SESSION['hair_temp']; ?>"></div>

                    <?php } ?>
                </div>
            
            </div>


        


            <div id="cores"> 
                
Hue:<input type="range" data-default="0" value="0" min="0" max="360" step="1" id="hue-rotate" oninput="setAttributes(this.value, getElementById('sat').value)"> <br>

Saturação:<input type="range" data-default="0" value="200" min="0" max="360"
 step="1" id="sat" oninput="setAttributes(getElementById('hue-rotate').value, this.value)"> <br>


 <a href="javascript:screenshot('hair_img')">ok</a>               

            </div>
            <div id="teste" class="teste">
                 <a href="javascript:sendAvatar()">Enviar</a> 
                <!--  <a href="javascript:screenshot('hair_img').download()">Enviar</a> -->
                <div id="box1" class="box1"></div>

            </div>
        
           
       
    
    </div>

</div>
</body>
</html>