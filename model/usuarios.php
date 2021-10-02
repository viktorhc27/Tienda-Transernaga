<?php
class Usuarios{
    private $us_id, $us_nombre, $us_apellApp, $us_apellApm, $us_telefono, $us_correo, $us_password, $us_direccion, $us_sexo, $create_time, $update_time, $rol_id;

    //GET Y SET

    /**
     * Metodo que permite obtener el valor de un atributo de la clase
     * 
     * @param       $key El atributo del que se desea obtener el valor.
     * 
     * @return      Se devuelve el valor del atributo.
     */

    public function __get($key){
        return $this->$key;
    }

    public function __set($key, $value){
        return $this->$key = $value;
    }

    public function agregar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("insert into usuarios ("
                . "us_id,"
                . "us_nombre, "
                . "us_apellApp, "
                . "us_apellApm, "
                . "us_telefono, "
                . "us_correo, "
                . "us_password, "
                . "us_direccion, us_sexo, "
                . "create_time, update_time"
                . "roles_ro_id)"
                . "values("
                . ":id, "
                . ":nombre, "
                . ":apellApp, "
                . ":apellApm, "
                . ":telefono, "
                . ":correo, "
                . ":password, "
                . ":direccion,"
                . ":sexo,"
                . ":create_time, update_time"
                . ":roles_ro_id)");
       $sql->bindParam("us_id",$this->us_id);
       $sql->bindParam("us_nombre",$this->us_nombre);
       $sql->bindParam("us_apellApp",$this->us_apellApp);
       $sql->bindParam("us_apellApm",$this->us_apellApm);
       $sql->bindParam("us_telefono",$this->us_telefono);
       $sql->bindParam("us_correo",$this->us_correo);
       $sql->bindParam("us_password",$this->us_password);
       $sql->bindParam("us_direccion",$this->us_direccion);
       $sql->bindParam("us_sexo",$this->us_sexo);
       $sql->bindParam("create_time",$this->create_time);
       $sql->bindParam("update_time",$this->create_time);
       $sql->bindParam("roles_ro_id",$this->roles_ro_id);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
?>