<?php

function verifUser(){

    session_start();

    if(!isset($_SESSION['user_usuario'])){  // Se não houver um usuário autenticado na sessão, ele retorna para página inicial.
        header("Location: ../index.php");
    }
}

function verifAdmin(){

    session_start();

    if(!isset($_SESSION['usuario'])){  // Se não houver um usuário(admin) autenticado na sessão, ele retorna para página inicial.
        header("Location: ../index.php");
    }

}
function verifSession(){

    session_start();

    if(isset($_SESSION['user_usuario'])){  // Se o usuário já estiver autenticado na sessão, a página levará automaticamente para a página "profile.php".
        header("Location: profile.php");
    }
    elseif(isset($_SESSION['usuario'])){  // Se o usuário(admin) já estiver autenticado na sessão, a página levará automaticamente para a página "admin.php".
        header("Location: admin.php");
    }

}

?>