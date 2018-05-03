
<script>

  
}
</script><?php 
session_start();
include("connect.php");
/*criptografia da url*/
include("scr_cript.php");			
/***********************/
	@$url_cript = $_REQUEST['url'];
	$url_decript = explode("/", url_decrypt($url_cript, $pass_cript));
	$iduser = $_SESSION['id_user'];
	$id_avatar = (int)$url_decript[0];
	@$id_cat = (int)$url_decript[1];
	
if($id_avatar != 0){
	$str_session = "av_cat_id_".$id_cat;

	$_SESSION[$str_session] = $id_avatar;
	$_SESSION['hair_temp'] = null;
}
if(@$_REQUEST['base64data']){
	####
		
		$url_avatar = "imagens/avatar_user/".$iduser."_av.jpg";

		$sql_update_avatar = mysqli_query($conectar, "UPDATE ks_usuarios SET avatar_user = '$url_avatar' WHERE id_user = '$iduser'");
		

		$data = $_REQUEST['base64data']; 
		$image = explode('base64,',$data);

		
		file_put_contents('../imagens/avatar_user/'.$iduser.'_av.jpg', base64_decode($image[1]));
		
		//echo "<img id=\"avatar\" src=\"../imagens/avatar_user/".$iduser."_av.jpg\">";
		//echo "<script type='text/javascript'> screenshot('avatar');</script>";


		 
		
	}

	
	if(@$_REQUEST['base64data_hair']){


		$n_data = $_REQUEST['base64data_hair'];
		 $image_n = explode('base64,',$n_data);
		 $url_hair = "imagens/avatar_user/hair_temp/".$iduser."_av_hair.jpg";
		 $_SESSION['hair_temp'] = $url_hair;

		 file_put_contents('../imagens/avatar_user/hair_temp/'.$iduser.'_av_hair.jpg', base64_decode($image_n[1]));
		

 		//$sql_update_avatar = mysqli_query($conectar, "UPDATE ks_teste SET descr = '$n_data' WHERE id = '1'");

	}

?>

<script>
			window.location="../avatar.php";
</script>