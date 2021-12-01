<?php
class Roles{
    private $ro_id, $rol_nombre,$create_time, $update_time;

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
            $sql = $con->prepare("insert into roles ("
                . "ro_id,"
                . "rol_nombre, "
                . "create_time, update_time"
                . ")"
                . "values("
                . ":id, "
                . ":nombre, "
                . ":create_time, update_time");
       $sql->bindParam("ro_id",$this->ro_id);
       $sql->bindParam("rol_nombre",$this->rol_nombre);
       $sql->bindParam("create_time",$this->create_time);
       $sql->bindParam("update_time",$this->create_time);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function modificar(){
        try{
            $con =(new Conexion())->Conectar();
            $sql= $con->prepare("update roles set ro_id=:id, rol_nombre=:nombre, create_time=:create_time, update_time=:update_time,");
           
            $sql->bindparam("id",$this->ro_id);
            $sql->bindparam("nombre",$this->rol_nombre);
            $sql->bindparam("create_time",$this->create_time);
            $sql->bindparam("update_time",$this->update_time);

            $res = $sql->execute();
            if ($sql->rowCount() == 1) {

                return $res;
            } else {
                return $res;
            }

        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public function buscar($id){
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM roles WHERE ro_id = $id");
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public function leer(){

        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from roles");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function Login(){

        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM roles where ro_id = :id");
            $sql->bindParam(':id', $this->ro_id);
            $sql->execute();
            $res = $sql->fetch();

            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function cerrar(){}

}
?>