<?php
require_once "conexion.php";
class datos extends Conexion {

    public function registromodel($datos){   
            $con = Conexion::getInstance()->Conectar();
            $clave = hash('md5',$datos["contrasena"]);
            $query = "EXECUTE RegistraPersonas '".$datos["nombre"]."','".$datos["apellido"]."','".$datos["id"]."','".$datos["correo"]."','".$datos["tipoid"]."','".$datos["fechareg"]."','".$datos["correo"]."','".$clave."'";
            $stmt = sqlsrv_query($con, $query);
            

            if($stmt){  
                return 1;
            }else{
                die( print_r( sqlsrv_errors(), true));
            }
    }

    public function validausermodel($idclientmodel, $tabla ){
        $conn2= Conexion::getInstance()->Conectar();
        $query = "SELECT * FROM $tabla WHERE Numeroident = '".$idclientmodel."'";
        $result3 = sqlsrv_query($conn2, $query);
        
        if($result3){
            $rows= sqlsrv_has_rows($result3);
            if ($rows > 0){
                return 1;
            }else{
                return 0;
            }
        } 
    }

    public function validasesionmodel($datos){
        $conn= Conexion::getInstance()->Conectar();
        $clave = hash('md5',$datos["contrasena"]);
        $query = "SELECT P.Nombres AS Nombrecompleto, 'cliente' AS Tipo FROM Personas P INNER JOIN Usuarios U ON P.Numeroident = U.Identificador WHERE P.Numeroident  = '".$datos["usuario"]."' AND U.Pass = '".$clave."'";
        $result = sqlsrv_query($conn, $query);
        
        if($result){
            $rows= sqlsrv_has_rows($result);
            if ($rows > 0){
                while($row = sqlsrv_fetch_array($result,  SQLSRV_FETCH_ASSOC )) {
                        $json[] = array(
                            'usuario' => $row['Nombrecompleto'],
                            'tipo' => $row['Tipo']
                        );
                }

                return $json;
        
                sqlsrv_close($conn);
            }else{
                return 0;
            }
        }
    }

    public function DatosModel(){
        $conn= Conexion::getInstance()->Conectar();
        $result = sqlsrv_query($conn, "EXECUTE verpersonas");
        
        if($result){
            $rows= sqlsrv_has_rows($result);
            if ($rows === True){
                while($row = sqlsrv_fetch_array($result,  SQLSRV_FETCH_ASSOC )) {
                        $json[] = array(
                            'Id' => $row['Numeroident'],
                            'usuario' => $row['Nombrecompleto'],
                            'Email' => $row['email'],
                            'Fecha' => date_format($row['Fechacreacion'],'d-m-Y')                            
                        );
                }        
                $jsonstring= json_encode($json);                
                return $jsonstring;   
        
                sqlsrv_close($conn);
            }else{
                return 0;
            }
        }
    }
}