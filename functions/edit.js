
function edit(id){

    window.location.href = 'admin.php?editID=' + id;
}

function show(id){
    document.getElementById("edit").style.display = "block";
    if (id == '0'){
        document.getElementById('msg').innerHTML = 'Adicionar um novo registro';
        }
}

function cancel(){
    document.getElementById("edit").style.display = "none";
}