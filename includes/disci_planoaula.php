
<style>


.scrollspySite{
  position: relative;
  height: 400px;
  overflow: auto;
  padding-right: 20px;
  padding-left: 20px;
  padding-top: 10px;
  background-color: #FFF;
   border: 1px solid rgba(0, 0, 0, 0.32);
}

.note-toolbar-wrapper{
  height: auto !important;
  text-align: left;

}

.container
{


  width: 80%;
}

.col-3{
  max-width: 30% !important;
}
.col-9{
  max-width: 69% !important;
 
  
}

.note-toolbar{
  width:99% !important;
}

button[type="button"]{
  font-size: 11px;
  width: auto;
}

.num_cap{
  
  width: 5px;
  text-align: center;
  
  margin-right: 10px;

}

.nav{
background-color: #FFF;
border-radius: 3px;
border: 1px solid rgba(0, 0, 0, 0.32);

}

.nav-link{
  padding: 4px !important;
  display:  -webkit-box !important;
  cursor: pointer;

}


.nav-link.active{

  display:  -webkit-box;
  color: #ffffff !important;
}

.direita_perfil_turma{
  background-color: rgba(142, 142, 142, 0.21);
}

table {
  font-size: 12px;
}

.bg-light{

}


</style>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({ width: 600, height: 300, dialogsInBody: true, dialogsFade: true, toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
    ]});
  });

  $(document).ready(function(){

      var item = location.href.split('#');
      var cap_num = item[1].substr(4);
      document.getElementById('cap'+ cap_num).className = "nav-link active";
      document.getElementById('cap_t'+ cap_num).className = "nav-link active";  

  })

  function linkitem($num_cap, $qtd_cap){

       var url = location.href.split('#');
       window.location = url[0] + "#item"+$num_cap;  

       document.getElementById('cap'+ $num_cap).className = "nav-link active"; 
       document.getElementById('cap_t'+ $num_cap).className = "nav-link active"; 

       for (var i = 1; i <= $qtd_cap; i++) {
        
        if(i != $num_cap){
       document.getElementById('cap'+ i).className = "nav-link"; 
       document.getElementById('cap_t'+ i).className = "nav-link";
        }
     }
       
  }
</script>

                 
                
                  <link href="/klasstation/jquery/bootstrap/summernote.css" rel="stylesheet">
                  <script type="text/javascript" src="/klasstation/jquery/bootstrap/summernote.js"></script>

                  

                  <?php 


                  // ######## VERIFICA AÇÃO #########
                  $action = @(int)$_REQUEST['action']; // 0 = visualizar, 1 = adicionar, 2 = editar
                  $cap_num = @$_REQUEST['num_cap'];

                   
                  if(@$cap_num){
                   ?>
                    <script>
                      var url = location.href.split('#');
                     location.href = url[0] + "#item<?php echo $cap_num;?>";
                   </script>
                    <?php
                    
                  }

                  switch($action){
                    case 2: 

                    $id_cap = $id_cap = @$_REQUEST['id_cap'];?>
                  <!-- ####### EDITAR CONTEÚDO DO PLANO DE AULA ######## -->
                  
                  

  <link href="/klasstation/jquery/bootstrap/bootstrapsm.css" rel="stylesheet">
  <script type="text/javascript" src="/klasstation/jquery/bootstrap/bootstrapsm.js"></script>


  <div class="container" style="width: 800px;">
                    <div class="row">
                      <div class="col-3">
                        <nav id="navbarVertical" class="navbar navbar-light bg-light">
                          <nav class="nav nav-pills flex-column">
                            <?php
                                 $sql_capitulos = mysqli_query($conectar, "Select * from ks_rel_plancap
                                  WHERE id_disciplina = '$id_disciplina_sel' ORDER BY cap_num");

                                 while($dados_cap = mysqli_fetch_assoc($sql_capitulos))
                                 {
                                    $id_cap_list = $dados_cap['id_plancap'];
                                    $cap_titulo = $dados_cap['cap_titulo'];
                                    $num_cap_t = $dados_cap['cap_num'];
                  
                                    ?>
                        
                
<table class="tablecap" border="0">
  <tr>
    <td><a href="/klasstation/scripts/scr_querys.php?type=remove_cap&id_cap=<?php echo $id_cap_list; ?>"> <img width="20" src="/klasstation/imagens/remove.png"> </a></td>
    <td><a href="<?php echo "/klasstation/disciplina/planoaula/$id_turma/$id_disciplina/2/$num_cap_t/$id_cap_list"?>""><img width="20" src="/klasstation/imagens/edit.png"></a></td>
   <td width="20" align="right"><a class="nav-link" id="cap<?php echo $num_cap_t;?>" href="<?php echo "/klasstation/disciplina/planoaula/$id_turma/$id_disciplina/2/$num_cap_t/$id_cap_list"?>"> <div style="width: 100%; text-align: center;"><?php echo $num_cap_t."."; ?></div> </a></td>
   <td> <a class="nav-link" id="cap_t<?php echo $num_cap_t;?>" href="<?php echo "/klasstation/disciplina/planoaula/$id_turma/$id_disciplina/2/$num_cap_t/$id_cap_list"?>"> <?php echo $cap_titulo; ?> </a></td>
 </tr>
</table>
    
                                    

                                    <?php 
                                  }
                             ?>          
                          </nav>
                        </nav>
                       <a href="/klasstation/disciplina/planoaula/<?php echo $id_turma; ?>/<?php echo $id_disciplina; ?>/1/0">
                          Adicionar capítulo
                        </a>
                      </div>

                      <div class="col-9">
                       <div class="form_capitulo" style="position: relative; margin-left: auto; margin-right: auto; width: 600px;">
                          <?php
                                 $sql_capitulos = mysqli_query($conectar, "Select * from ks_rel_plancap
                                  WHERE id_plancap = '$id_cap'");

                                 while($dados_cap = mysqli_fetch_assoc($sql_capitulos))
                                 {
                                    $cap_num = $dados_cap['cap_num'];
                                    $cap_titulo = $dados_cap['cap_titulo'];
                                    $cap_texto = $dados_cap['cap_text'];
                                  } ?>
              <form id="new_cap" name="editcap_planaula" method="post" action="/klasstation/scripts/scr_querys.php" align="center">
                Número do capítulo: <input size="2" type="text" name="num_cap" value="<?php echo $cap_num;?>"> &nbsp; &nbsp;
                Título do capítulo:  <input size="55" type="text" name="titulo_cap" value="<?php echo $cap_titulo;?>"> <br> <br>
                <textarea id="summernote" name="text_cap"><?php echo $cap_texto; ?></textarea>

                  <input type="hidden" name="type" value="edit_cap" /><p>
                  <input type="hidden" name="id_cap" value="<?php echo $id_cap; ?>" /><p>
                   <div style="float: right;"><input type="submit" id="btn_acessar" value="Salvar Alterações" /></div>
              </form>

</div>
                    </div>

                  </div>

                </div>

  

  
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>


  




                    <?php break;
                  case 1: ?>
                  <!-- ####### ADICIONAR NOVO CONTEÚDO AO PLANO DE AULA ######## -->

               

  <link href="/klasstation/jquery/bootstrap/bootstrapsm.css" rel="stylesheet">
  <script type="text/javascript" src="/klasstation/jquery/bootstrap/bootstrapsm.js"></script>


  <div class="container" style="width: 800px;">
                    <div class="row">
                      <div class="col-3">
                        <nav id="navbarVertical" class="navbar navbar-light bg-light">
                          <nav class="nav nav-pills flex-column">
                            <?php
                                 $sql_capitulos = mysqli_query($conectar, "Select * from ks_rel_plancap
                                  WHERE id_disciplina = '$id_disciplina_sel' ORDER BY cap_num");

                                 while($dados_cap = mysqli_fetch_assoc($sql_capitulos))
                                 {
                                  $id_cap_list = $dados_cap['id_plancap'];
                                    $cap_titulo = $dados_cap['cap_titulo'];
                                    $num_cap_t = $dados_cap['cap_num'];


                                    ?>
                        
                
<table class="tablecap" border="0">
  <tr>
    <td><a href="/klasstation/scripts/scr_querys.php?type=remove_cap&id_cap=<?php echo $id_cap_list; ?>"> <img width="20" src="/klasstation/imagens/remove.png"> </a></td>
    <td><a href="<?php echo "/klasstation/disciplina/planoaula/$id_turma/$id_disciplina/2/$num_cap_t/$id_cap_list"?>""><img width="20" src="/klasstation/imagens/edit.png"></a></td>
   <td width="20" align="right"><a class="nav-link" id="cap<?php echo $num_cap_t;?>" href="<?php echo "/klasstation/disciplina/planoaula/$id_turma/$id_disciplina/2/$num_cap_t/$id_cap_list"?>"> <div style="width: 100%; text-align: center;"><?php echo $num_cap_t."."; ?></div> </a></td>
   <td> <a class="nav-link" id="cap_t<?php echo $num_cap_t;?>" href="<?php echo "/klasstation/disciplina/planoaula/$id_turma/$id_disciplina/2/$num_cap_t/$id_cap_list"?>"> <?php echo $cap_titulo; ?> </a></td>
 </tr>
</table>
    
                                    

                                    <?php 
                                  }
                             ?>          
                          </nav>
                        </nav>
                       <a href="/klasstation/disciplina/planoaula/<?php echo $id_turma; ?>/<?php echo $id_disciplina; ?>/1/0">
                          Adicionar capítulo
                        </a>
                      </div>

                      <div class="col-9">
                       <div class="form_capitulo" style="position: relative; margin-left: auto; margin-right: auto; width: 600px;">

              <form id="new_cap" name="novocap_planaula" method="post" action="/klasstation/scripts/scr_querys.php" align="center">
                Número do capítulo: <input size="2" type="text" name="num_cap"> &nbsp; &nbsp;
                Título do capítulo:  <input size="50" type="text" name="titulo_cap"> <br> <br>
                <textarea id="summernote" name="text_cap"></textarea>

                  <input type="hidden" name="type" value="new_cap" /><p>
                  <input type="hidden" name="id_disc" value="<?php echo $id_disciplina_sel; ?>" /><p>
                   <div style="float: right;"><input type="submit" id="btn_acessar" value="Adicionar" /></div>
              </form>

</div>
                    </div>

                  </div>

                </div>

  

  
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>


  




                    <?php break;
                    case 0: ?>

            
                  <link href="/klasstation/jquery/bootstrap/bootstrap.css" rel="stylesheet">
                  <script type="text/javascript" src="/klasstation/jquery/bootstrap/bootstrap.js"></script>
                  
                  <!-- ####### VISUALIZAR PLANO DE AULA ######## -->
                  <div class="container" id="container">
                    <div class="row">
                      <div class="col-3">
                        <nav id="navbarVertical" class="navbar navbar-light bg-light" >
                          <nav class="nav nav-pills flex-column">
                            <?php
                                 $sql_capitulos = mysqli_query($conectar, "Select * from ks_rel_plancap
                                  WHERE id_disciplina = '$id_disciplina_sel' ORDER BY cap_num");
                                  $qtd_cap = mysqli_num_rows($sql_capitulos);

                                 while($dados_cap = mysqli_fetch_assoc($sql_capitulos))
                                 {
                                    $id_cap_list = $dados_cap['id_plancap'];
                                    $cap_titulo = $dados_cap['cap_titulo'];
                                    $num_cap_t = $dados_cap['cap_num'];

                           
                     
                                    $url = explode('#', $_SERVER ['REQUEST_URI']);
                                    $url_att = $url[0]."#item".$num_cap_t;
                   
                                    ?>
                        
                
<table class="tablecap" border="0" ">
  <tr>
    <td><a href="/klasstation/scripts/scr_querys.php?type=remove_cap&id_cap=<?php echo $id_cap_list; ?>"> <img width="20" src="/klasstation/imagens/remove.png"> </a></td>
    <td><a href="<?php echo "/klasstation/disciplina/planoaula/$id_turma/$id_disciplina/2/$num_cap_t/$id_cap_list"?>""><img width="20" src="/klasstation/imagens/edit.png"></a></td>
   <td width="20" align="right"><a class="nav-link" id="cap<?php echo $num_cap_t;?>"  onClick="linkitem(<?php echo $num_cap_t;?>, <?php echo $qtd_cap;?>)"> <div style="width: 100%; text-align: center;"><?php echo $num_cap_t."."; ?></div> </a></td>
   <td> <a class="nav-link" id="cap_t<?php echo $num_cap_t;?>"  onClick="linkitem(<?php echo $num_cap_t;?>, <?php echo $qtd_cap;?>)"> <?php echo $cap_titulo; ?> </a></td>
 </tr>
</table>

<script>

</script>
                                    

                                    <?php 
                                  }
                             ?>          
                          </nav>
                        </nav>
                       <a href="/klasstation/disciplina/planoaula/<?php echo $id_turma; ?>/<?php echo $id_disciplina; ?>/1/0">
                          Adicionar capítulo
                        </a>
                      </div>

                      <div class="col-9">
                        <div data-spy="scroll" data-target="#navbarVertical" data-offset="10" class="scrollspySite">
                           <?php
                                 $sql_capitulos = mysqli_query($conectar, "Select * from ks_rel_plancap
                                  WHERE id_disciplina = '$id_disciplina_sel' ORDER BY cap_num");

                                 while($dados_cap = mysqli_fetch_assoc($sql_capitulos))
                                 {
                                    $cap_titulo = $dados_cap['cap_titulo'];
                                    $cap_text = $dados_cap['cap_text'];
                                    $num_cap = $dados_cap['cap_num'];

                                    echo "<h5 id=\"item".$num_cap."\">".$cap_titulo."</h5>";
                                    echo "<p>".$cap_text."</p>" ;
                                  }
                             ?>        

                        

                              </div>
                            </div>

                          </div>

                        </div>
<!-- ####### Visualizar Plano de Aula ######## -->
                        <?php break; } ?>
