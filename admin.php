<?php

include "conexao.php";

session_start();

if(!isset($_SESSION['usuario'])){  // Se não houver um usuário(admin) autenticado na sessão, ele retorna para página inicial.
    header("Location: index.php");
}

$consulta = "SELECT * FROM tabela";
$con = $mysqli->query($consulta) or die($mysqli->error);

if(isset($_GET['deleta'])){

    $id = filter_input(INPUT_GET, 'id'); 
    $delete = "DELETE FROM tabela WHERE id = '$id' ";
    $deletando = mysqli_query($mysqli, $delete) or die($mysqli->error);
   
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body{
            background-image: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.3)), url(/src/img/bg2.jpg);
            }
        td{
            font-size: 1.1rem;
            padding: 5px;
        }
    </style>

</head>
<body>

<div class="dashboard">

<table>

    <p class="login-text"> Dashboard </p>

    <tr>
    <td style="text-align:center;"> <strong> Nome </strong> </td>
    <td style="text-align:center;"> <strong> Sobrenome </strong> </td>
    <td style="text-align:center;"> <strong> Endereço </strong> </td>
    <td style="text-align:center;"> <strong> Deletar </strong> </td>

    </tr>

    <?php
    while($dado = $con->fetch_array()){
    ?>

    <tr>
        <td> <?php echo $dado["first_name"]; ?> </td>
        <td> <?php echo $dado["last_name"]; ?> </td>
        <td> <?php echo $dado["address"]; ?> </td>
        <td> <a class="login-register-text" href="admin.php?id=<?php echo $dado["id"] ?>&deleta=deletar">Deletar</a> </td>
    </tr>

    <?php } ?>

</table>

<a class="login-register-text" href="logout.php">Desconectar</a>

</div>

</body>

</html>