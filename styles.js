

$(document).ready(function(){
    $('#delete_btn').click(function(event){
        event.preventDefault();
        var id = $(this).val();
        var confirmDelete = confirm("¿Está seguro que desea eliminar este elemento?");
        if(confirmDelete){
            // redirigir a delete.php con el id del elemento a eliminar
            window.location.href = "delete.php?id=" + id;
        }
    });
});

console.log("hola");

let s = "hola";