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
        define ('DB_HOST','guamal.subastar.com.co\SQLEXPRESS'); // instancia sql server
        define ('DB_USER','sa'); //Usuario de sql server
        define ('DB_PASS','51573m4.464'); //Password de sql serve
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