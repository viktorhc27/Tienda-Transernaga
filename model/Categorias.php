<?php 
Class Categorias {
    private $cat_id, $cat_nombre, $cat_estado, $create_time, $update_time;
    
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
            $sql = $con->prepare("insert into categorias (cat_id, cat_nombre, cat_estado, create_time, update_time) values(:id,:nombre,:estado,:create_time,:update_time)");
            $sql->bindParam(':id', $this->cat_id);
            $sql->bindParam(':nombre', $this->cat_nombre);
            $sql->bindParam(':estado', $this->cat_estado);
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
            $sql= $con->prepare("update productos set cat_id=:id, cat_nombre =:nombre, cat_estado=:estado, create_time=:create_time, update_time=:update_time  WHERE cat_id = :id");
            
            $sql->bindParam(':id', $this->cat_id);
            $sql->bindParam(':nombre', $this->cat_nombre);
            $sql->bindParam(':estado', $this->cat_estado);
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
            $sql = $con->prepare("select * from categorias");
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
            $sql = $con->prepare("DELETE FROM categorias WHERE cat_id = :id");
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
            $sql = $con->prepare("select * from categorias where  cat_id = :id");
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