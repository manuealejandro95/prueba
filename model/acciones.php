<?php
require_once "conexion.php";
class datos extends Conexion {

    public function registromodel($datos){   
            $con = Conexion::getInstance()->Conectar();
            $clave = hash('md5',$datos["contrasena"]);
            $query = "CALL RegistraPersonas('".$datos["nombre"]."','".$datos["apellido"]."','".$datos["id"]."','".$datos["correo"]."','".$datos["tipoid"]."','".$datos["usuario"]."','".$clave."')";
            $stmt =mysqli_query($con, $query);
            

            if($stmt){  
                return 1;
            }else{
                printf("Connect failed: %s\n", $con->connect_error);
                exit();
            }
    }

    public function validausermodel($idclientmodel, $tabla ){
        $conn2= Conexion::getInstance()->Conectar();
        $query = "SELECT * FROM $tabla WHERE Numeroident = '".$idclientmodel."'";
        $result3 = mysqli_query($conn2, $query);
        
        if($result3){
            $rows= mysqli_num_rows($result3);
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
        $query = "SELECT P.Nombres AS Nombrecompleto, 'cliente' AS Tipo FROM Personas P INNER JOIN Usuarios U ON P.Numeroident = U.Identificador WHERE P.Numeroident = '".$datos["usuario"]."' AND U.Pass = '".$clave."'";
        $result = mysqli_query($conn, $query);
        
        if($result){
            $rows= mysqli_num_rows($result);
            if ($rows > 0){
                while($row = mysqli_fetch_array($result)) {
                        $json[] = array(
                            'usuario' => $row['Nombrecompleto'],
                            'tipo' => $row['Tipo']
                        );
                }                        
                return $json;   
        
                mysqli_close($conexion);
            }else{
                return 0;
            }
        }
    }

    /*public function DatosModel(){
        $conn= Conexion::getInstance()->Conectar();
        $result = mysqli_query($conn, "EXECUTE verpersonas");
        
        if($result){
            $rows= sqlsrv_has_rows($result);
            if ($rows === True){
                while($row = sqlsrv_fetch_array($result,  SQLSRV_FETCH_ASSOC )) {
                        $json[] = array(
                            'usuario' => $row['Nombrecompleto'],
                            'Fecha' => $row['Fechacreacion']
                        );
                }        
                $jsonstring= json_encode($json);                
                return $jsonstring;   
        
                mysqli_close($conexion);
            }else{
                return 0;
            }
        }
    }*/
}