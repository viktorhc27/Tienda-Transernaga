<?php 
class Imagenes{
private $img_id, $ruta, $create_time, $update_time;

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
            $sql = $con->prepare("insert into imagen ("
                . "img_id,"
                . "ruta, "
                . "create_time, update_time)"
                . "values("
                . ":id, "
                . ":ruta, "
                . ":create_time, update_time");
       $sql->bindParam("id",$this->img_id);
       $sql->bindParam("ruta",$this->ruta);
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
            $sql= $con->prepare("update imagen set rut=:ruta, create_time=:create_time, update_time=:update_time where img_id= :id");           
            $sql->bindParam("id",$this->img_id);
            $sql->bindParam("ruta",$this->ruta);
            $sql->bindParam("create_time",$this->create_time);
            $sql->bindParam("update_time",$this->create_time);

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

    public function buscar(){
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM imagen WHERE img_id = :id");
            $sql->bindParam(':id', $id);
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
            $sql = $con->prepare("select * from imagen");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
   
}


?>