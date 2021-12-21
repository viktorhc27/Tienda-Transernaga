<?php
class Categorias
{
    private $cat_id, $cat_nombre, $cat_estado, $create_time, $update_time, $imagen;

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
            $sql = $con->prepare("insert into categorias (cat_id, cat_nombre, cat_estado, create_time, update_time,imagen) values(:id,:nombre,:estado,:create_time,:update_time,:imagen)");
            $sql->bindParam(':id', $this->cat_id);
            $sql->bindParam(':nombre', $this->cat_nombre);
            $sql->bindParam(':estado', $this->cat_estado);
            $sql->bindParam(':create_time', $this->create_time);
            $sql->bindParam(':update_time', $this->update_time);
            $sql->bindParam(':imagen', $this->imagen);
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
            $sql = $con->prepare("update categorias set cat_nombre =:nombre, cat_estado=:estado, update_time=:update_time, imagen =:imagen WHERE cat_id = :id");
            $sql->bindParam(':id', $this->cat_id);
            $sql->bindParam(':nombre', $this->cat_nombre);
            $sql->bindParam(':estado', $this->cat_estado);
            $sql->bindParam(':update_time', $this->update_time);
            $sql->bindParam(':imagen', $this->imagen);

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
    public function buscar($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * from categorias WHERE cat_id = :id");
            $sql->bindparam(':id', $id);
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function cambiar_estado($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT cat_estado from categorias WHERE cat_id = $id");
            $sql->execute();
            $res = $sql->fetch();
            if ($res['cat_estado'] == 1) {
                $sql = $con->prepare("UPDATE categorias SET cat_estado = 0 WHERE cat_id = $id");
                $sql->execute();
                return false;
            } else {
                $sql = $con->prepare("UPDATE categorias SET cat_estado = 1 WHERE cat_id = $id");
                $sql->execute();
                return true;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
