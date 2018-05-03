<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KlasStation Login</title>
<link rel="stylesheet" href="css/login.css"/>
</head>

<body>

<div class="geral">


    <div class="topo_login">
    <!-- includes -->
    </div>

	<div class="logo_index">
    <img src="imagens/logo2.png" width="300" />
    </div>	
    <div class="centro_login">
        
        <div class="box">
            <div class="login">
        
                <div class="box_topo_login">
         
                </div>
                <div class="titulo_login">
                    <a style="color: #adc7d0;" href="cadastro.php">Você ainda não está cadastrado? Clique Aqui.</a>
                </div>
        
        
                <div class="form_login">
        
        
                    <table border="0">
                    
                    <form action="scripts/scr_login.php" method="post" name="login">
                    <tr><td>E-mail:&nbsp;&nbsp; <input type="text" name="email" size="20" class="input_login" /> <br /></td></tr>
                    <tr><td align="center">Senha:&nbsp; <input type="password" name="senha" size="20" class="input_login"/> <br />
                    <span class="esq_senha"><a href="esqueci_senha.php">Esqueceu a sua senha? Clique aqui!</a></span></td></tr>
                   
                    <tr align="center"><th height="35"  valign="bottom" ><input type="submit" value="Entrar" class="btn_login" /></th></tr>
                    </form></table>
                </div>
            </div> 
        </div>
    
    </div>
</div>





</body>
</html>