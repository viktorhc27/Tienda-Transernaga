<?php
class DireccionesUsuarios
{
    private $usuarios_us_id;
    private $direcciones_di_id;


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
            $sql = $con->prepare("INSERT INTO direccion_usuarios (usuarios_us_id, direcciones_di_id) values (:usuario_id, :direcciones_id)");
            $sql->bindParam("usuario_id", $this->usuarios_us_id);
            $sql->bindParam("direcciones_id", $this->direcciones_di_id);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function buscar($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM direccion_usuarios where usuarios_us_id = :id ");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function listar($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM direccion_usuarios where usuarios_us_id = :id ");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function direccion_usuarios($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT *,(SELECT di_nombre from direcciones WHERE direcciones_di_id = direcciones.di_id)as di_nombre FROM `direccion_usuarios` WHERE `usuarios_us_id` =:id;");
            $sql->bindParam(":id", $id);
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
            $sql = $con->prepare("DELETE FROM direccion_usuarios where direcciones_di_id = :id");
            $sql->bindParam(":id", $id);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
