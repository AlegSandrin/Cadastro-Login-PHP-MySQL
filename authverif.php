<?php

function emailverif($email){

    include "conexao.php";
    
    $query = "SELECT * FROM users WHERE user_email = '$email'";
    $consulta = mysqli_query($mysqli, $query);
    if ($consulta->num_rows > 0){   // Se a consulta retornar resultados (esse email já ter sido cadastrado) a função retorna "false";
        return false;
    }
    else{
        return true;
    }
}

function usernameverif($usuario){

    include "conexao.php";
    
    $query = "SELECT * FROM users WHERE user_usuario = '$usuario'";
    $consulta = mysqli_query($mysqli, $query);
    if ($consulta->num_rows > 0){   // Se a consulta retornar resultados (esse email já ter sido cadastrado) a função retorna "false";
        return false;
    }
    else{
        return true;
    }
}

?>