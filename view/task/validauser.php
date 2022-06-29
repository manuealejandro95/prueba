<?php   

    require_once "../../controller/controller.php";
    require_once "../../model/acciones.php";

    class Validausuario{
        public $identificacionusuario;

        public function validarusuario(){
            $id = $this->identificacionusuario;
            $respuesta = MvcController::validausercontroller($id);
            echo $respuesta;
        }
    }

    $id = new Validausuario();
    $id -> identificacionusuario = $_POST["usuario"];
    $id -> validarusuario();