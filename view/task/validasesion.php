<?php   

    require_once "../../controller/controller.php";
    require_once "../../model/acciones.php";

    class MvcSesion{
        public $enviardata;
        public function SesionView(){
            $datosenvia = $this->enviardata;
                if (isset($datosenvia["contrasena"]) && isset($datosenvia["usuario"])){
                    $respuesta = MvcController::validasesioncontroller($datosenvia);
                    $array = $respuesta;
                    if(isset($array[0]['usuario'])){
                        session_start();
                        $_SESSION['username'] = $array[0]['usuario'];
                        $url = "/pruebalogin/admin";
                        echo $url;
                    }
                    
                }else{
                    return 3;
                }
        }
    }

    $data = new MvcSesion();
    $data -> enviardata = array("usuario"=>ucwords(strtolower($_POST["usuario"])),
                                "contrasena"=>$_POST["contrasena"]);
    $data -> SesionView();