$('#iniciar').click(function(e){
    e.preventDefault();
    validacion();
});

function validacion(){
    switch(true){
        case $("#usua").val().length === 0:
            Swal.fire({
                title: '<strong>Error</strong>',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">Campo usuario vacío.</p>',
                showConfirmButton: false,
                timer: 5500,
                returnFocus: false
            });
            $("#usua").focus();  
            break;
        case $("#contrasena").val().length === 0:
            Swal.fire({
                title: '<strong>Error</strong>',
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
            console.log(respuesta);
            switch(respuesta){                                   
                case "0":
                    Swal.fire({
                        title: '<strong>Información</strong>',
                        icon: 'info',
                        html: '<p class="text-danger font-weight-bold">El usuario no existe.</p>',
                        showConfirmButton: false,
                        timer: 7000,
                        returnFocus: false
                    });
                        document.getElementById("formulario").reset();
                        $("#usua").focus();
                    break;                    
                case "/prueba/admin":
                        document.getElementById("formulario").reset();
                        window.location.href = respuesta;
                    break;
                default:
                    Swal.fire({
                        title: '<strong>Información</strong>',
                        icon: 'info',
                        html: '<p class="text-danger font-weight-bold">Datos en blanco. Debe escribir un correo y contraseña.</p>',
                        showConfirmButton: false,
                        timer: 7000,
                        returnFocus: false
                    });
                        $("#usua").focus();
            }                     
        }
    });
}