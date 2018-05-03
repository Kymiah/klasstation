<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KlasStation Login</title>
<link rel="stylesheet" href="css/cadastro.css"/>
</head>

<body>
<script type="text/javascript">

function changeselected(obj){	
	var valor = obj.value;
	var cadastro = document.getElementById('form_cadastro');
	var user = document.getElementById('form_aluno');
	
	user.style.visibility = "hidden";
	cadastro.style.visibility = "visible";
	
	cadastro.style.height = "418px";	
	setTimeout(function(){user.style.visibility = "visible"} , 1000);
	
	
	var valor = "";
	
}


</script>
<div class="geral">


    <div class="topo_login">
    <!-- includes -->
    </div>

	<div class="logo_index">
    <img src="imagens/klasstation.PNG" />
    </div>	
    <div class="centro_login">
        
        <div class="box">
            <div class="login">
        
                <div class="box_topo_login">
         <a href="login.php"><div class="btn_voltar_cad"><</div></a>
                </div>
                <div class="titulo_login">
                <form action="scripts/scr_cadastro.php" method="post" name="cadastro" id="cadastro" />
                    Selecione o tipo de conta: <select form="cadastro" name="tipo_conta" onChange="changeselected(this)">
                    <option value="">  </option>
                    <option value="aluno"> Aluno </option>
                    <option value="professor"> Professor </option>
                    </select>
                </div>
        
        
                <div class="form_cadastro" id="form_cadastro">
       				
<!-- ***************** FORMULÁRIO CADASTRO ********************* -->        			
                    <div class="form_aluno" id="form_aluno">
                    	<table border="0">	
                    	<tr><td align="left">Nome:&nbsp;&nbsp;</td> <td><input type="text" name="nome" size="20" class="input_login" /></td> </tr>
                        <tr><td align="left">Sobrenome:&nbsp;&nbsp;</td> <td><input type="text" name="sobrenome" size="20" class="input_login" /></td> </tr>
                        <tr><td align="left">Apelido:&nbsp;&nbsp;</td> <td><input type="text" name="apelido" size="20" class="input_login" /></td> </tr>
                        
                        <tr><td align="left">Idade:&nbsp;&nbsp;</td> <td><input type="text" name="idade" size="3" maxlength="3" class="input_idade" /> Anos</td> </tr>
                      <tr><td align="left">  Sexo: </td> <td><select  name="sexo" >
                    <option value="masculino"> Masculino  </option>
                    <option value="feminino"> Feminino </option>
                    <option value="transgenero"> Transgênero </option>
                    <option value="naobinario"> Não-binário </option>
                    </select></td> </tr>
                        <tr><td align="left">País:&nbsp;&nbsp;</td> <td><input type="text" name="pais" size="20" class="input_login" /></td> </tr>
                        <tr><td align="left">Cidade:&nbsp;&nbsp;</td> <td><input type="text" name="cidade" size="20" class="input_login" /></td> </tr>                        
                        <tr><td align="left">E-mail:&nbsp;</td> <td><input name="email" size="20" class="input_login"/> </td></tr>
                        <tr><td align="left">Whatsapp:&nbsp;</td> <td><input name="whatsapp" size="20" class="input_login"/> </td></tr>
                    	<tr><td align="left">Senha:&nbsp;</td> <td><input type="password" name="senha" size="20" class="input_login"/> </td>
                    	</tr>                   
                    	<tr align="center"><td height="35"  valign="bottom" colspan="2" ><input type="submit" value="Cadastrar" class="btn_login" /></td></tr>
                    	</table>
                    </div>
<!-- *********************************************************** -->                     

                  </form>
                </div>
            </div> 
        </div>
    
    </div>
</div>





</body>
</html>