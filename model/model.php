<?php
class MvcModel{
    public function Enlacesmodel($enlace){
        if($enlace=="inicio"){
            $module = "view/views/".$enlace.".php";
        }elseif ($enlace == "sesion"){
            $module = "view/views/".$enlace.".php";
        }elseif ($enlace == "admin"){
            $module = "view/views/".$enlace.".php";
        }elseif ($enlace == "salir"){
            $module = "view/task/".$enlace.".php";
        }elseif ($enlace == "index"){
            $module = "view/views/sesion.php";
        }else {
            $module = "view/views/sesion.php";
        }
        return $module;
    }
}
