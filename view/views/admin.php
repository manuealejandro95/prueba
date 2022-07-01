<?php
    session_start();
    if (isset($_SESSION['username'])){
        $usuario= $_SESSION['username'];
    }else{
        header("location: /prueba/sesion");
    }
    
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="salir">Cerrar Sesion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="inicio">Registrar</a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>-->
    </ul>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <p class="nav-link">Bienvenido <?php echo $usuario;?></p>
        </li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h2>Registros</h2>
        </div>
    </div>
    <div class="row" id="registros">
    </div>
</div>
<script src="js/registros.js?v=<?php echo(rand()); ?>"></script>