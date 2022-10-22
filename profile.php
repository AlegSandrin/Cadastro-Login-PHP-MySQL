<?php

include "functions/conexao.php";
include "functions/authverif.php";
include "functions/sessionverif.php";

verifUser();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body{
            background-image: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.3)), url(/src/img/bg2.jpg);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1> <?php echo "Seja bem-vindo " . $_SESSION['user_usuario']; ?> </h1>
        <div id="logout">
        <a class="login-register-text" href="functions/logout.php"><img src="src/img/logout.png" alt="logout">Desconectar</a>
        </div>
    </div>

</body>
</html>