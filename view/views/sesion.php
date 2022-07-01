<?php
    session_start();
    if (isset($_SESSION['username'])){
        header("location: /prueba/admin");
    }    
?>
<div class="container">    
    <div class="row mt-4">
        <div class="col">
            <form method="POST" id="formulario">
                <div class="row p-1">
                    <div class="col-12 text-center">
                        <h2>Iniciar Sesión</h2>
                    </div>
                </div>                    
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="inputState">Correo electrónico</label>
                        <input name="usua" type="email" class="form-control" id="usua">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="inputState">Contraseña</label>
                        <input type="password" name="contrasena" class="form-control" id="contrasena">
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-6 col-sm-6 col-xl-6">
                        <button id="iniciar" class="btn btn-lg btn-block btn-primary">Iniciar Sesion</button>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-6 col-sm-6 col-xl-6">
                        <a class="btn btn-lg btn-block btn-danger" href="inicio" role="button">Registrarse</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/iniciosesion.js?v=<?php echo(rand()); ?>"></script>


