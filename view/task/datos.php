<?php   

    require_once "../../controller/controller.php";
    require_once "../../model/acciones.php";

    class MvcDatos{
        public function DatosView(){
                    $respuesta = MvcController::Datoscontroller();
                    echo $respuesta;
        }
    }

    $data = new MvcDatos();
    $data -> DatosView();