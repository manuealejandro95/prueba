$( "#identificacion" ).change(function() {
    $("#user").val($("#identificacion").val());
});

$("#identificacion").change(function(){
    let identificacion = $("#identificacion").val();
    let datos = new FormData();
    datos.append("usuario", identificacion);
    $.ajax({
        url:"view/task/validauser.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            if(respuesta == 1){
                Swal.fire({
                    title: '<strong>Error</strong>',
                    position: 'top-end',
                    icon: 'error',
                    html: '<p class="text-danger font-weight-bold">El usuario con identificiacion: '+ identificacion +' ya esta registrado!</p>',
                    showConfirmButton: false,
                    timer: 5500,
                    returnFocus: false
                })
                document.getElementById("formu").reset();
                $("#identificacion").focus();
                window.setTimeout(function () {
                    window.location.href = "/prueba";
                }, 6000)              
            }            
        }
    });
});
