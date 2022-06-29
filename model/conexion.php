<?php
class Conexion{

    static private $instance = null;
     
    private function __contruct() {}
     
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Conexion();
        }
        return self::$instance;
    }

    public function Conectar(){
        define ('DB_HOST',''); // instancia sql server
        define ('DB_USER',''); //Usuario de sql server
        define ('DB_PASS',''); //Password de sql serve
        define ('DB_NAME','PRUEBA'); //nombre de la base de datos
        
        $serverName = DB_HOST;
        $connectionInfo = array("Database"=>DB_NAME, "UID"=>DB_USER, "PWD"=>DB_PASS, "CharacterSet"=>"UTF-8");
        $conexion = sqlsrv_connect( $serverName, $connectionInfo );
        return $conexion;
        /*if (!$conexion) {
            die('Error de Conexión (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }else{
            echo "conexion exitosa";
        }*/
    }
}