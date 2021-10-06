<?php 
Class Armados_Tipos {
    private $arm_id, $arm_nombre,  $create_time, $update_time;
    
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
            $sql = $con->prepare("insert into armados_tipos (arm_id, arm_nombre, create_time, update_time) values(:id,:nombre,:create_time,:update_time)");
            $sql->bindParam(':id', $this->arm_id);
            $sql->bindParam(':nombre', $this->arm_nombre);
            $sql->bindParam(':create_time', $this->create_time);
            $sql->bindParam(':update_time', $this->update_time);

            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function modificar(){
        try{
            $con =(new Conexion())->Conectar();
            $sql= $con->prepare("update armados_tipos set arm_id=:id, arm_nombre =:nombre,  create_time=:create_time, update_time=:update_time  WHERE arm_id = :id");
            
            $sql->bindParam(':id', $this->arm_id);
            $sql->bindParam(':nombre', $this->arm_nombre);
            $sql->bindParam(':create_time', $this->create_time);
            $sql->bindParam(':update_time', $this->update_time);

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


    public function listar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from Armados_Tipos");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function eliminar($id)
    {

        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("DELETE FROM Armados_Tipos WHERE arm_id = :id");
            $sql->bindParam(":id", $id);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function buscar($id){
        try{
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from Armados_Tipos where  arm_id = :id");
            $sql->bindparam(':id',$id);
            $sql->execute();
            $res= $sql->fetch();
            return $res;
        }catch (PDOException $ex){
            return $ex->getMessage();
        }
    }



}

?>