<?php

include "functions/conexao.php";
include "functions/authverif.php";
include "functions/sessionverif.php";

verifSession();

error_reporting(0); // Desativa o relatório de erros

if (isset($_POST['botao'])){
    $usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
    $senha = md5($_POST['senha']);

    $admquery = "SELECT * FROM admin WHERE usuario = '".$usuario."' AND senha = '".$senha."'";
    $userquery = "SELECT * FROM users WHERE user_usuario = '".$usuario."' AND user_senha = '".$senha."'";
    $admlogin = mysqli_query($mysqli, $admquery);
    $userlogin = mysqli_query($mysqli, $userquery);

    if ($admlogin->num_rows > 0)
    {
        $row = mysqli_fetch_assoc($admlogin);
        $_SESSION = $row;
        $newURL = "admin.php";
        header("Location: $newURL");
        die();
    }
    
    elseif($userlogin->num_rows > 0)
    {
        $row = mysqli_fetch_assoc($userlogin);
        $_SESSION = $row;
        $newURL = "profile.php";
        header("Location: $newURL");
        die();
    }
    else
    {
        echo "<body onload="."error('login')".">";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <script type='text/javascript' src='functions/auth_errors.js'></script>

</head>
<body>


    <div class="container">
        <div class="form">
            <form action="index.php" method="post" width="100%">

            <p class="login-text"> Login </p>

            <div class="input-group">
            <input type="text" name="usuario" placeholder="Usuário" value="<?php echo $usuario ?>" required>
            </div>
            <div class="input-group">
            <input type="password" name="senha" placeholder="Senha" value="<?php echo $_POST['senha'] ?>" required>
            </div>
            <div class="input-group">
            <input type="submit" name="botao" value="Entrar">
            </div>
            <p class="login-register-text">Não possui uma conta? <a href="register.php">Registre-se aqui</a>.</p>

            </form>
        </div>
    </div>

    <div id="errorbox"> <p id="errormsg"></p> </div>

</body>
</html>


