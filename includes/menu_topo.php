<style type="text/css">
a:link {
	color: #9ca7ab;	
}
a:visited {
	color: #9ca7ab;	
}
a:hover {
	color: #9ca7ab;	
}
a:active {
	color: #9ca7ab;	
}
</style>

<?php 



switch($_SESSION['tipo_user']){
case 0: //professor
 ?>
				<a href="turmas.php"><div class="item_menu">
            		Turmas
                </div></a>
                <div class="item_menu">
            		Material Complementar
                </div>
                <div class="item_menu">
            		Cronograma
                </div>
                <div class="item_menu">
            		Projeto
                </div>
                <div class="item_menu" style="border-right: 2px solid #e3e9ec;">
            		Avaliações
                </div>
<?php 
break;
case 1: //aluno
 ?>
				 <a href="turmas.php"><div class="item_menu">
            		Turmas
                </div></a>
				<div class="item_menu">
            		Conquistas
                </div>
                <div class="item_menu">
            		Material Complementar
                </div>
                <div class="item_menu">
            		Cronograma
                </div>
                <div class="item_menu">
            		Projeto
                </div>
                <div class="item_menu" style="border-right: 2px solid #e3e9ec;">
            		Avaliações
                </div>
<?php 

} ?>