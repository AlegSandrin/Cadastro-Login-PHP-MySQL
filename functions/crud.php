<?php

include 'conexao.php';

if(isset($_GET['deleta'])){

    $id = filter_input(INPUT_GET, 'id'); 
    $delete = "DELETE FROM tabela WHERE id = '$id' ";
    $deletando = mysqli_query($mysqli, $delete) or die($mysqli->error);
    header("Location: ../admin.php");
   
}

$editdados = [];

if(isset($_GET['editID'])){

    $id = filter_input(INPUT_GET, 'editID'); 
    $query = "SELECT * FROM tabela WHERE id = '$id' ";
    $consulta = mysqli_query($mysqli, $query) or die($mysqli->error);
    $editdados = $consulta->fetch_array();
    if($id == 0){
    echo "<body onload='show(0)'></body>";
    }
    else{
    echo "<body onload='show(1)'></body>";
    }

}

if(isset($_POST['submit'])){

    $idverif = filter_input(INPUT_GET, 'editID'); 
    $id = $_POST['id'];
    $nome = $_POST['first_name'];
    $sobrenome = $_POST['last_name'];
    $endereco = $_POST['address'];
    
    if(!empty($_POST['id'])){
        $query = "UPDATE tabela SET first_name = '".$nome."', last_name = '".$sobrenome."', address = '".$endereco."' WHERE id = '".$id."'";
        $atualizar= mysqli_query($mysqli, $query) or die($mysqli->error);
    
    }
    else{
        $query = "INSERT INTO tabela (first_name, last_name, address) VALUES ('".$nome."','".$sobrenome."','".$endereco."')";
    $cadastrar= mysqli_query($mysqli, $query) or die($mysqli->error);
    }

}

?>