///var x = window.location.hash; // Retorne a parte âncora de um URL. (após a #)
//if(x == "#error")
//{
//window.alert("Falha no login");
//}

function error(error){

    document.getElementById("errorbox").style.display = "block";
    var errormsg;

switch(error){
    case ('login'):
    errormsg = "Falha no login. Usuário ou Senha incorreto";
    break;
    
    case ('email'):
    errormsg = "Falha no cadastro. Email já foi utilizado.";
    break;

    case ('password'):
    errormsg = "Falha no cadastro. As senhas não se coincidem";
    break;

    case ('error'):
    errormsg = "Falha no cadastro. As senhas não coincidem.";
    break;

    case ('username'):
    errormsg = "Falha no cadastro. Nome de usuário já foi utilizado.";
    break;
    }
    document.getElementById('errormsg').innerHTML = errormsg;
}

function sucessfuly(){
    document.getElementById("sucessbox").style.display = "block";
}