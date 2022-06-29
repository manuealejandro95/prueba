$('#enviar').click(function(e){
    e.preventDefault();
    validaciones();
});
function validaciones(){
    switch(true){
        case $("#tipoidentificacion").val().length === 0:
            Swal.fire({
                title: '<strong>Error</strong>',
                position: 'top-end',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">Tipo de identificación inválido.</p>',
                showConfirmButton: false,
                timer: 5500,
                returnFocus: false
            });
            $("#tipoidentificacion").focus();  
            break;
        case $("#user").val().length === 0:
                Swal.fire({
                    title: '<strong>Error</strong>',
                    position: 'top-end',
                    icon: 'error',
                    html: '<p class="text-danger font-weight-bold">Usuario Incorrecto.</p>',
                    showConfirmButton: false,
                    timer: 5500,
                    returnFocus: false
                });
                $("#user").focus();  
                break;
        case $("#identificacion").val().length === 0:
            Swal.fire({
                title: '<strong>Error</strong>',
                position: 'top-end',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">Campo cédula o nit vacio.</p>',
                showConfirmButton: false,
                timer: 5500,
                returnFocus: false
            });
            $("#identificacion").focus();  
            break;
        case $("#identificacion").val().length < 6:
            Swal.fire({
                title: '<strong>Error identificación</strong>',
                position: 'top-end',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">La cantidad de caracteres debe ser minimo 6.</p>',
                showConfirmButton: false,
                timer: 5500,
                returnFocus: false
            });
            $("#identificacion").focus(); 
            break;
        case $("#correo").val().length === 0 || $("#correo").val().indexOf('@', 0) == -1 || $("#correo").val().indexOf('.', 0) == -1:
            Swal.fire({
                title: '<strong>Error</strong>',
                position: 'top-end',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">Dirección de email inválido.</p>',
                showConfirmButton: false,
                timer: 5500,
                returnFocus: false
            });
            $('#correo').focus();
            break;
        case $("#password").val().length === 0:
            Swal.fire({
                title: '<strong>Error</strong>',
                position: 'top-end',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">Debe escribir una contraseña.</p>',
                showConfirmButton: false,
                timer: 5500,
                returnFocus: false
            });
            $('#password').focus();
            break;
        case $("#password2").val().length === 0:
            Swal.fire({
                title: '<strong>Error</strong>',
                position: 'top-end',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">Debe confirmar la contraseña escrita.</p>',
                showConfirmButton: false,
                timer: 5500,
                returnFocus: false
            });
            $('#password2').focus();
            break;
        case $("#password").val().length != 0 && $("#password").val().length < 6:
            Swal.fire({
                title: '<strong>Error</strong>',
                position: 'top-end',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">La contraseña debe tener minimo 6 caracteres.</p>',
                showConfirmButton: false,
                timer: 5500,
                returnFocus: false
            });
            $('#password').focus();
            break;
        case $("#password").val().length != 0 && !checkPassword($("#password").val()):
            Swal.fire({
                title: '<strong>Error</strong>',
                position: 'top-end',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">La contraseña debe tener Una mayúscula inicial, sin espacios y debe ser alfanumérica.</p>',
                showConfirmButton: false,
                timer: 6000,
                returnFocus: false
            });
            $('#password').focus();
            break;
        case $("#password").val().length != 0 && $("#password").val() != $("#password2").val():
            Swal.fire({
                title: '<strong>Error</strong>',
                position: 'top-end',
                icon: 'error',
                html: '<p class="text-danger font-weight-bold">Las contraseñas no coinciden.</p>',
                showConfirmButton: false,
                timer: 6000,
                returnFocus: false
            });
            $('#password').focus();
            $('#password2').focus();
            break;
        default:
            let datos = new FormData();
            datos.append("id", $('#identificacion').val());
            datos.append("nombre", $('#nombre').val());
            datos.append("apellido", $('#apellidos').val());
            datos.append("usuario", $('#user').val());
            datos.append("correo", $('#correo').val());
            datos.append("contrasena", $('#password2').val());
            datos.append("tipoid", $('#tipoidentificacion').val());            
            enviarformulario(datos);
    }
}

function enviarformulario(datos){
    $.ajax({
        url:"view/task/registrer.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            console.log(respuesta);
            switch(respuesta){
                case "1":
                    Swal.fire({
                        title: '<strong>Registro Exitoso</strong>',
                        position: 'top-center',
                        icon: 'success',
                        html: '<p class="text-success font-weight-bold">Registro Exitoso.</p>',
                        showConfirmButton: false,
                        timer: 5000,
                        returnFocus: false
                    });
                    document.getElementById("formu").reset();
                    window.setTimeout(function () {
                        window.location.href = "/pruebalogin/sesion";
                    }, 6000) 
                    break;                    
                case "2":
                    Swal.fire({
                        title: '<strong>Información</strong>',
                        position: 'top-center',
                        icon: 'info',
                        html: '<p class="text-danger font-weight-bold">El usuario que desea registrar ya existe. </p>',
                        showConfirmButton: false,
                        timer: 7000,
                        returnFocus: false
                    });
                    document.getElementById("formu").reset();
                    window.setTimeout(function () {
                        window.location.href = "/pruebalogin";
                    }, 8000)
                    break;                    
                default:
                    Swal.fire({
                        title: '<strong>Error</strong>',
                        position: 'top-center',
                        icon: 'error',
                        html: '<p class="text-danger font-weight-bold">No se pudo realizar el registro.</p>',
                        showConfirmButton: false,
                        timer: 7000,
                        returnFocus: false
                    });
                    document.getElementById("formu").reset();
                    window.setTimeout(function () {
                        window.location.href = "/pruebalogin";
                    }, 8000)
            }                      
        }
    });
}

/*$( document ).ready(function() {
    $.ajax({
        url:"view/task/datos.php",
        method: "POST",
        data: null,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
           console.log(respuesta); 
        }
    });
});*/

function checkPassword(valor){
    var myregex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/; 
   if(myregex.test(valor)){
       return true;        
   }else{
       return false;        
   }   
 }