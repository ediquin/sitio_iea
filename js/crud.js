function mostrar(){
    $.ajax({
        type:"POST",
        url:"procesos/mostrarDatos.php",
        success:function(r){
            $('#tablaDatos').html(r);
        }
    });
}

function obtenerDatos(id){

}

function eliminarDatos(id){
    swal({
        tittle: "¿Estas seguro de eliminar este registro?",
        text: "¡Una vez eliminado no podrá recuperarse!",
        icon: "warning",
        buttons: true,
        dangermode: true,
    })
    .then((willDelete) => {
        if(willDelete){

        }
    });
}