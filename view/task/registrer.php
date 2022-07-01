<?php
    require_once "../../controller/controller.php";
    require_once "../../model/acciones.php";

    class MvcRegistro{
        public $enviardata;
        public function RegistrarView(){
            $datosenvia = $this->enviardata;
                if (isset($datosenvia["contrasena"]) && isset($datosenvia["id"])){
                    $respuesta = Mvccontroller::RegistrarController($datosenvia);
                    echo $respuesta;
                }else{
                    echo "3";
                }
        }
    }

    $data = new MvcRegistro();
    $data -> enviardata = array("id"=>$_POST["id"],
                                "nombre"=>ucwords(strtolower($_POST["nombre"])),
                                "apellido"=>ucwords(strtolower($_POST["apellido"])),
                                "fechareg"=>ucwords(strtolower($_POST["fechareg"])),
                                "correo"=>$_POST["correo"],
                                "tipoid"=>$_POST["tipoid"],
                                "contrasena"=>$_POST["contrasena"]);
    $data -> RegistrarView();