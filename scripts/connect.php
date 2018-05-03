<?php

$erro = "Deu ruim! :'(";

// local					 //server    //user   //senha   //database
$conectar = mysqli_connect("localhost","root","", "klasstation") or die($erro);

mysqli_query($conectar, "SET NAMES 'utf8'");
mysqli_query($conectar, 'SET character_set_connection=utf8');
mysqli_query($conectar, 'SET character_set_client=utf8');
mysqli_query($conectar, 'SET character_set_results=utf8');


?>