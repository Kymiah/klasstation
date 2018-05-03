<?php
//Carrega as variáveis com os valores que foram inseridos no ###FORMULÁRIO###.
$email_form = $_POST["email"];
$senha_form = $_POST["senha"];

if($email_form&&$senha_form)
{
	include("connect.php");
	
	//Verifica se existe o usuário na base de dados, com base no que foi digitado no formulário.
	$sql = mysqli_query($conectar, "Select * from ks_usuarios Where email_user='$email_form'");
	
	//carrega uma variável com a quantidade de linhas encontradas
	$numlinhas = mysqli_num_rows($sql);
	
	//verifica se a quantidade de linhas encontradas é diferente de zero.
	if($numlinhas!=0)
	{
		while($dados = mysqli_fetch_assoc($sql))
		{
			//Carrega as variáveis com os valores da ###BASE DE DADOS###
			$dbid = $dados['id_user'];
			$dbpref = $dados['preferencia'];
			$dbapelido = $dados['apelido'];
			$dbemail = $dados['email_user'];
			$dbsenha = $dados['senha_user']; 
			$dbnome = $dados['nome_user'];
			$dbsobrenome = $dados['sobrenome_user'];
			$dbtipo = $dados['tipo_user'];
								
		}
		
		if (crypt($senha_form, $dbsenha) === $dbsenha)  //verificação da codificação da senha
		
		{
			ob_start();
			session_start(); // inicia a sessão
			
			//carrega as variáveis da sessão com os dados da base de dados
			$_SESSION['id_user'] = $dbid;
			$_SESSION['nome_user'] = $dbnome;
			$_SESSION['sobrenome_user'] = $dbsobrenome;
			$_SESSION['email_user'] = $dbemail;
			$_SESSION['tipo_user'] = $dbtipo;

			/* #### DEFINIÇÃO PADRÃO DE AVATAR #### */
        
            $id_bg = '3';
            $id_skin = '1';
            $id_hair = '4';
            $id_eyes = '6';
            $id_mouth = '8';
            $id_cloth = '10';

            $_SESSION['av_cat_id_0'] = $id_bg;
            $_SESSION['av_cat_id_1'] = $id_skin;
            $_SESSION['av_cat_id_2'] = $id_hair;
            $_SESSION['av_cat_id_3'] = $id_eyes;
            $_SESSION['av_cat_id_4'] = $id_mouth;
            $_SESSION['av_cat_id_5'] = $id_cloth;      
        
					
			?>            
			<script>
				window.location="../index.php";
            </script>
			<?php			
		}
		else
		{
		echo "usuário ou senha inválidos";
		}
	}
	else 
	{
		echo "usuário não encontrado";
		
	}
}

else	
{
	echo "Formulário não preenchido corretamente";
}
