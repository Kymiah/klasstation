<?php 
include("connect.php");
$user_sel = $_POST['id_user'];
$id_trophy = $_POST['id_trophy'];
$id_disciplina = $_POST['id_disciplina'];

echo $user_sel;
echo $id_disciplina;
$sql_give_trophy= mysqli_query($conectar, "INSERT INTO ks_rel_trophy VALUES (NULL, '$id_trophy', '$user_sel', now())");

?>

		<script>			
		window.location=window.history.go(-1);
        </script>