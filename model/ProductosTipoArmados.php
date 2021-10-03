<?php 
class ProductosTipoArmados{
    private $productos_armados_id, $productos_pro_id, $armados_tipo_arm_id;

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
            $sql = $con->prepare("insert into productos_has_armados_tipo (productos_armados_id,productos_pro_id, armados_tipo_arm_id) values(:productos_armados_id,:productos_pro_id, :armados_tipo_arm_id)");
            $sql->bindParam(":productos_armados_id",$this->productos_armados_id);
            $sql->bindParam(':productos_pro_id', $this->productos_pro_id);
            $sql->bindParam(':armados_tipo_arm_id', $this->armados_tipo_arm_id);
          
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function modificar(){
        try{
            $con =(new Conexion())->Conectar();
            $sql= $con->prepare("update productos_has_armados_tipo set productos_pro_id=:productos_pro_id, armados_tipo_arm_id=:armados_tipo_arm_id WHERE productos_armados_id = :id");
            $sql->bindParam(":id",$this->productos_armados_id);
            $sql->bindParam(':productos_pro_id', $this->productos_pro_id);
            $sql->bindParam(':armados_tipo_arm_id', $this->armados_tipo_arm_id);

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
            $sql = $con->prepare("select * from productos_has_armados_tipo");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
  
    public function buscar($id){
        try{
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from productos_has_armados_tipo where  productos_armados_id = :id");
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