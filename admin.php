<?php

include "functions/conexao.php";
include "functions/authverif.php";
include "functions/sessionverif.php";
include "functions/crud.php";

verifAdmin();

error_reporting(0);

$consulta = "SELECT * FROM tabela";
$con = $mysqli->query($consulta) or die($mysqli->error);

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
        a{
            text-decoration: none;
        }
    </style>
    <script src="functions/edit.js"></script>

</head>
<body>

<div class="dashboard">

<table>

    <p class="login-text"> Dashboard </p>

    <tr>
    <td style="text-align:center;"> <strong> Nome </strong> </td>
    <td style="text-align:center;"> <strong> Sobrenome </strong> </td>
    <td style="text-align:center;"> <strong> Endereço </strong> </td>
    <td style="text-align:center;"> <strong></strong> </td>

    </tr>

    <?php
    while($dado = $con->fetch_array()){
    ?>

    <tr>
        <td> <?php echo $dado["first_name"]; ?> </td>
        <td> <?php echo $dado["last_name"]; ?> </td>
        <td> <?php echo $dado["address"]; ?> </td>
        <td> <a class="login-register-text" href="admin.php?id=<?php echo $dado["id"]?>&deleta">Deletar</a> | <a class="login-register-text" href="#" onclick="edit(<?php echo $dado['id']?>)">Editar</a></td>
    </tr>

    <?php } ?>

    <div id="edit"> 
        <div class="form">
            <form action="admin.php" method="post" width="100%">

            <p id="msg" class="login-text" style="font-size: 1.8rem;"> Alterando dados de <?php echo $editdados["id"] ." - ". $editdados["first_name"]; ?> </p>

            <input style="display:none;" type="text" name="id" value="<?php echo $editdados["id"] ?>">
            <div class="input-group">
            <input type="text" name="first_name" placeholder="Nome" value="<?php echo $editdados["first_name"] ?>" required>
            </div>
            <div class="input-group">
            <input type="text" name="last_name" placeholder="Usuário" value="<?php echo $editdados["last_name"] ?>" required>
            </div>
            <div class="input-group">
            <input type="text" name="address" placeholder="Endereço" value="<?php echo $editdados["address"] ?>" required>
            </div>
            <div class="input-group">
            <input type="submit" name="submit" value="Salvar Alterações">
            </div>

            </form>

            <div class="input-group">
            <input type="submit" name="cancel" value="Cancelar" onclick="cancel()">
            </div>

        </div>
    </div>

</table>

<div id="logout">
<a class="login-register-text" href="#" style="float:left;" onclick="edit(0)">Adicionar</a>
<a class="login-register-text" href="functions/logout.php" style="float:right;"><img src="src/img/logout.png" alt="logout">Desconectar</a>
</div>

</div>

</body>

</html>