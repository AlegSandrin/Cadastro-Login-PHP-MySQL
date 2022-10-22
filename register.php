<?php

include "functions/conexao.php";
include "functions/authverif.php";
include "functions/sessionverif.php";

verifSession();

error_reporting(0);


if (isset($_POST['submit'])){
    $usuario = mysqli_real_escape_string($mysqli, $_POST["usuario"]);
    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $senha = md5($_POST['senha']);
    $confirmsenha = md5($_POST['confirmsenha']);

    if($senha === $confirmsenha){
        if(emailverif($email) === true){
            if(usernameverif($usuario) === true){
            $query = "INSERT INTO users (user_usuario, user_email, user_senha)
                      VALUES ('$usuario', '$email', '$senha')";
            $cadastrar = mysqli_query($mysqli, $query);
            if($query){
                echo "<body onload='sucessfuly()'>";
                $usuario = "";
                $email = "";
                $_POST['senha'] = "";
                $_POST['confirmsenha'] = "";
            }
            else{ // Se o cadastro não foi concluído
                echo "<body onload="."error('error')".">";
            }
            }
            else{ // Se o usuário digitado já estiver cadastrado
                echo "<body onload="."error('username')".">";
            }
        }
        else{ // Se o email digitado já estiver cadastrado
            echo "<body onload="."error('email')".">";
        }
    }
    else{ // Se as senhas não estiverem iguais
        echo "<body onload="."error('password')".">";
    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar-se</title>

    <script type='text/javascript' src='functions/auth_errors.js'></script>
    <link rel="stylesheet" type="text/css" href="style.css">


</head>
<body>


    <div class="container">
        <div class="form">
            <form action="register.php" method="post" width="100%">

            <p class="login-text"> Registrar-se </p>

            <div class="input-group">
            <input type="text" name="usuario" placeholder="Usuário" value="<?php echo $usuario ?>" required>
            </div>
            <div class="input-group">
            <input type="email" name="email" placeholder="Email" value="<?php echo $email ?>" required>
            </div>
            <div class="input-group">
            <input type="password" name="senha" placeholder="Senha" value="<?php echo $_POST['senha'] ?>" required>
            </div>
            <div class="input-group">
            <input type="password" name="confirmsenha" placeholder="Confirmar Senha" value="<?php echo $_POST['confirmsenha'] ?>" required>
            </div>
            <div class="input-group">
            <input style="color: white " type="submit" name="submit" value="Cadastrar">
            </div>
            <p class="login-register-text">Já possui uma conta? <a href="index.php">Acesse sua conta aqui</a>.</p>

            </form>
        </div>
    </div>

    <div id="errorbox"> <p id="errormsg"></p> </div>
    <div id="sucessbox"> <p class="sucessmsg"> Usuário cadastrado com sucesso! <a href="index.php">Faça login aqui</a>. </p></div>

</body>
</html>