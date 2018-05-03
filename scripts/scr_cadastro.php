<?php
	include('connect.php');	
$tipo_user = $_POST['tipo_conta'];
$pref_user = $_POST['pref_nome'];

/*criptografia da senha*/
		$custo = '08';
		$seed = uniqid(mt_rand(), true);
 
		// Generate salt
		$salt = base64_encode($seed);
		$salt = str_replace('+', '.', $salt);
		$salt = substr($salt, 0, 22);				
/***********************/
$tipo = "";
$pref = "";

if($tipo_user == 'professor'){$tipo = 1;}
if($tipo_user == 'aluno'){$tipo = 0;}
if($pref_user == 'nome'){$pref = 0;}
if($pref_user == 'apelido'){$pref = 1;}


		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$apelido = $_POST['apelido'];
		$idade = $_POST['idade'];
		$sexo = $_POST['sexo'];
		$pais = $_POST['pais'];
		$cidade = $_POST['cidade'];
		$email= $_POST['email'];
		$whatsapp= $_POST['whatsapp'];
		$senha = $_POST['senha'];

		$avatar_default = "0";

		if($sexo == "masculino"){ $avatar_default = "default_mas.jpg";	}
		if($sexo == "feminino"){ $avatar_default = "default_fem.jpg";	}
		if($sexo == "transgenero"){ $avatar_default = "default_trans.jpg";	}
		if($sexo == "naobinario"){ $avatar_default = "defaultnbinario.jpg";	}
		
		// Gera um hash baseado em bcrypt
		$hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');
		
        $sql_notic = mysqli_query($conectar, "INSERT INTO ks_usuarios VALUES (NULL, '$tipo', '$nome', '$sobrenome', '$apelido', '$idade', '$sexo', '$pais', '$cidade', '$email', '$whatsapp', '$hash', 'imagens/avatar_user/$avatar_default')");

       

		?>
		<script>
			alert("Usuário cadastrado com sucesso!");
			window.location="../login.php"
        </script>
		<?php		   		
		

//###########################################################################################################################################################
		