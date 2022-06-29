$('#iniciar').click(function(e){
    e.preventDefault();
    validacion();
});

function validacion(){
    switch(true){
        case $("#usua").val().length === 0:
            Swal.fire({
                title: '<strong>Error</strong>',
                position: 'top-end',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">Tipo de identificación inválido.</p>',
                showConfirmButton: false,
                timer: 5500,
                returnFocus: false
            });
            $("#usua").focus();  
            break;
        case $("#contrasena").val().length === 0:
            Swal.fire({
                title: '<strong>Error</strong>',
                position: 'top-end',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">Debe escribir una contraseña.</p>',
                showConfirmButton: false,
                timer: 5500,
                returnFocus: false
            });
            $('#contrasena').focus();
            break;
        default:
            let datos = new FormData();
            datos.append("usuario", $('#usua').val());
            datos.append("contrasena", $('#contrasena').val());        
            enviarformulario(datos);
    }
}

function enviarformulario(datos){
    $.ajax({
        url:"view/task/validasesion.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            switch(respuesta){                                   
                case "0":
                    Swal.fire({
                        title: '<strong>Información</strong>',
                        icon: 'info',
                        html: '<p class="text-danger font-weight-bold">El usuario no existe. </p>',
                        showConfirmButton: false,
                        timer: 7000,
                        returnFocus: false
                    });
                        document.getElementById("formulario").reset();
                        /*window.setTimeout(function () {
                        window.location.href = "/pruebalogin";
                    }, 8000)*/
                    break;                    
                case "/pruebalogin/admin":
                        document.getElementById("formulario").reset();
                        window.location.href = respuesta;
                    break;
            }                     
        }
    });
}