<?php
//Carrega as variáveis com os valores que foram inseridos no ###FORMULÁRIO###.
include("connect.php");

session_start();

$acc_id_turma = $_POST["id_turma_acc"];
$acc_id_user = $_POST["id_user_acc"];
$acc_pwd = $_POST["psw_acess"];
$tipo_user = $_SESSION['tipo_user'];

$sql = mysqli_query($conectar, "Select * from ks_turmas where id_turma='$acc_id_turma'");

while($dados = mysqli_fetch_assoc($sql))
		{
			if($acc_pwd == ""){

				$sql_acess= mysqli_query($conectar, "INSERT INTO ks_rel_turmas VALUES (NULL, '$acc_id_turma', '$acc_id_user', '$tipo_user')");
					
							$sql_sel_ind = mysqli_query($conectar, "Select * from ks_indicadores");
						
						while($dados_ind = mysqli_fetch_assoc($sql_sel_ind))
							{
								$id_indicador = $dados_ind['id_indicador'];
								$nome_indicador = $dados_ind['nome_indicador'];
							
								$sql_create_ind= mysqli_query($conectar, "INSERT INTO ks_rel_indicadores VALUES (NULL, '$id_indicador', '$acc_id_turma', '$acc_id_user', '0', '50', '100', '0')");

							}
						}
			else
			{


			$dbsenha_acc = $dados['senha_turma'];
			
			if($acc_pwd == $dbsenha_acc)
			{
					$sql_acess= mysqli_query($conectar, "INSERT INTO ks_rel_turmas VALUES (NULL, '$acc_id_turma', '$acc_id_user', '$tipo_user')");
					
					$sql_sel_ind = mysqli_query($conectar, "Select * from ks_indicadores");
					
					while($dados_ind = mysqli_fetch_assoc($sql_sel_ind))
					{
						$id_indicador = $dados_ind['id_indicador'];
						$nome_indicador = $dados_ind['nome_indicador'];
						
						$sql_create_ind= mysqli_query($conectar, "INSERT INTO ks_rel_indicadores VALUES (NULL, '$id_indicador', '$acc_id_turma', '$acc_id_user', '0', '50', '100', '0')");
					}
					
					
		
			}
			}
		}

?>            
			<script>
				window.location="../turmas.php";
            </script>
<?php	
