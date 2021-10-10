<?php
class Marcas
{
    private $mar_id, $mar_nombre, $create_time, $update_time;

    //GET Y SET

    /**
     * Metodo que permite obtener el valor de un atributo de la clase
     * 
     * @param       $key El atributo del que se desea obtener el valor.
     * 
     * @return      Se devuelve el valor del atributo.
     */

    public function __get($key)
    {
        return $this->$key;
    }

    public function __set($key, $value)
    {
        return $this->$key = $value;
    }

    public function agregar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("insert into marcas (mar_id,mar_nombre, mar_imagen, create_time, update_time)values(:id, :nombre, :imagen, :create_time, :update_time)");
            $sql->bindParam("id", $this->mar_id);
            $sql->bindParam("nombre", $this->mar_nombre);
            $sql->bindParam("imagen", $this->mar_imagen);
            $sql->bindParam("create_time", $this->create_time);
            $sql->bindParam("update_time", $this->update_time);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function modificar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("update Marcas set mar_id=:id, mar_nombre=:nombre,mar_imagen=:imagen, create_time=:create_time, update_time=:update_time where mar_id=:id");

            $sql->bindparam("id", $this->mar_id);
            $sql->bindparam("nombre", $this->mar_nombre);
            $sql->bindparam("imagen", $this->mar_imagen);
            $sql->bindparam("create_time", $this->create_time);
            $sql->bindparam("update_time", $this->update_time);

            $res = $sql->execute();
            if ($sql->rowCount() == 1) {

                return $res;
            } else {
                return $res;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function buscar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM marcas WHERE mar_id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function listar()
    {

        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from marcas");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
