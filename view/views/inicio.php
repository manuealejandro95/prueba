<div class="container">
    <div class="row mt-4">
        <div class="col">
            <form method="POST" id="formu">
                <div class="row p-1">
                    <div class="col-12 text-center">
                        <h2>FORMULARIO DE REGISTRO</h2>
                    </div>
                </div>               
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="tipoidentificacion">Tipo de Documento</label>
                        <select id="tipoidentificacion" name="tipoidentificacion" class="form-control">
                            <option value="" selected>Seleccione Tipo de documento</option>
                            <option value="CC">Cedula</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="RC">Registro Civil</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Número de Documento</label>
                        <input type="text" class="form-control" name="identificacion" id="identificacion">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fechareg" id="fechan">Fecha de Registro</label>
                        <input type="date" class="form-control" placeholder="dd/mm/aaaa" name="fechareg" id="fechareg">
                    </div>            
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6" id="nombres">
                        <label for="inputEmail4">Nombres</label>
                        <input type="text" class="form-control" placeholder="Digitar solo nombres" name="nombre"
                            id="nombre">
                    </div>
                    <div class="form-group col-md-6" id="apellido">
                        <label for="inputPassword4">Apellidos</label>
                        <input type="text" class="form-control" placeholder="Digitar solo apellidos" name="apellidos"
                            id="apellidos">
                    </div>
                    <!--<div class="form-group col-md-4">
                        <label for="inputCity" id="fechan">Fecha de Registro</label>
                        <input type="date" class="form-control" placeholder="dd/mm/aaaa" name="fechareg" id="fechareg">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCity" id="fechan">Nombre y Apellidos</label>
                        <input type="text" class="form-control" name="nandp" id="nandp" readonly>
                    </div>-->
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Correo electrónico</label>
                        <input name="correo" type="email" class="form-control" id="correo">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Repetir Contraseña</label>
                        <input type="password" name="password2" class="form-control" id="password2">
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-6 col-sm-6 col-xl-6">
                        <button id="enviar" class="btn btn-lg btn-block btn-primary">Registrarse</button>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-6 col-sm-6 col-xl-6">
                        <a class="btn btn-lg btn-block btn-danger" href="sesion" role="button">Iniciar Sesion</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/validacion.js?v=<?php echo(rand()); ?>"></script>
<script src="js/action.js?v=<?php echo(rand()); ?>"></script>