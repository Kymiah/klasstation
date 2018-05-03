<?php 
$pass_cript = "0403534040404004004";

function url_encrypt($url, $pass){

$encriptado = mcrypt_encrypt(MCRYPT_BLOWFISH, $pass, $url, MCRYPT_MODE_ECB);
$base64codic = base64_encode($encriptado);

return $base64codic;


}

function url_decrypt($url64, $pass){

$url = base64_decode($url64);
$descriptado = mcrypt_decrypt(MCRYPT_BLOWFISH, $pass, $url, MCRYPT_MODE_ECB);


return $descriptado;

}

?>