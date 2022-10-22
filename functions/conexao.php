<?php

$host = "localhost";
$user = "root";
$pass = "";
$bd = "csharp";

$mysqli = new mysqli($host, $user, $pass, $bd);

if(!$mysqli){
 echo "<script>alert('Falha na Conexão')</script>";
}
?>
