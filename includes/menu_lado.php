<style type="text/css">

</style>

<link rel="stylesheet" href="/klasstation/scripts/jstree/themes/default/style.css" />
<script src="/klasstation/scripts/jstree/jstree.js"></script>

<script>
  $(function () {
    // 6 create an instance when the DOM is ready
    
    $('#jstree').jstree({
  "core" : {
    "themes" : {
      "variant" : "large"
    }
  }}).bind("select_node.jstree", function (e, data) {
    var href = data.node.a_attr.href;
    var parentId = data.node.a_attr.parent_id;
    if(href == '#')
    return '';
 
    window.location = href;
    });
    
  });
  
</script>

<div  id="jstree" class="tree_lado" >
    <!--<ul>
            <li>a
                <ul>
                    <li>a 
                        <ul>
                            <li>b</li>
                        </ul>
                    </li>
                </ul>
            </li>
    </ul></div>

data-jstree='{ "selected" : true, "opened" : true }'

-->
    
       <?php 
       $id_user = $_SESSION['id_user'];

       $sql_curso = mysqli_query($conectar, "Select * from ks_rel_cursos INNER JOIN ks_cursos ON ks_rel_cursos.id_curso = ks_cursos.id_curso WHERE id_usuario = '$id_user'");


       while($dados_curso = mysqli_fetch_assoc($sql_curso))
       {
        $id_curso = $dados_curso['id_curso'];                        
        $curso_nome = $dados_curso['curso_nome'];  


        ?>
        <ul><li data-jstree='{"opened" : true }' id="child_node_c<?php echo $id_curso; ?>"><a href="/klasstation/turmas.php?id_curso=<?php echo $id_curso; ?>"><?php echo $curso_nome ;?></a>
            <?php 

            $sql_turma = mysqli_query($conectar, "Select * from ks_rel_turmas INNER JOIN ks_turmas ON ks_rel_turmas.id_turma = ks_turmas.id_turma WHERE ks_turmas.id_curso = '$id_curso' AND ks_rel_turmas.id_user = '$id_user'");


            while($dados_turma = mysqli_fetch_assoc($sql_turma))
            {
                $id_turma = $dados_turma['id_turma'];                        
                $turma_nome = $dados_turma['turma_nome'];  


                ?>
                <ul><li id="child_node_t<?php echo $id_turma; ?>"><a href="/klasstation/disciplinas.php?id_turma=<?php echo $id_turma; ?>&id_curso=<?php echo $id_curso;?>" ><?php echo $turma_nome; ?></a><ul>


                
                    <?php 

                    $sql_disc = mysqli_query($conectar, "Select * from ks_rel_disciplinas INNER JOIN ks_disciplinas ON ks_rel_disciplinas.id_disciplina = ks_disciplinas.id_disciplina WHERE ks_disciplinas.id_turma = '$id_turma' AND ks_rel_disciplinas.id_usuario = '$id_user'"); 

                    while($dados_disc = mysqli_fetch_assoc($sql_disc))
                    {
                        $id_disciplina = $dados_disc['id_disciplina'];                        
                        $disci_nome = $dados_disc['disc_nome'];
                        $count = $id_disciplina;  

                         /* ######## Criptografar dados que serão transmitidos ######                    
                         $uc_count = $id_turma."/".$id_disciplina."/0/0";                   
                         $url_cript_count = url_encrypt($uc_count, $pass_cript);
                        ########################################################### */

                        echo "<li id=\"child_node_".$count."\" ><a href=\"/klasstation/disciplina/inicio/$id_turma/$id_disciplina\"
                        />".$disci_nome."</a></li>"; 

                        ?>

             <?php } ?></ul></li></ul>
                    
      <?php } ?> </li></ul> <?php 

    } ?>
                        
                      
            
     
    
</div>
<?php 

 ?>


<div class="ing_n_curso"> <a href="cursos.php">Ingressar em um novo curso </a></div>