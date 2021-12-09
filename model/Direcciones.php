<?php
class Direcciones
{
    private $di_id;
    private $di_nombre;
    private $di_numero;
    private $di_latitud;
    private $di_longitud;

    public function __get($key)
    {
        return $this->$key;
    }

    public function __set($key, $value)
    {
        return $this->$key = $value;
    }

    public function agregar_()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("INSERT INTO direcciones (di_id,di_nombre,di_numero,di_latitud,di_longitud) values (:id,:nombre,:numero,:latitud,:longitud)");
            $sql->bindParam("di_id", $this->di_id);
            $sql->bindParam("di_nombre", $this->di_nombre);
            $sql->bindParam("di_numero", $this->di_numero);
            $sql->bindParam("di_latitud", $this->di_latitud);
            $sql->bindParam("di_longitud", $this->di_longitud);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function agregar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("INSERT INTO direcciones (di_id,di_nombre,di_latitud,di_longitud) values (:id,:nombre,:latitud,:longitud)");
            $sql->bindParam("id", $this->di_id);
            $sql->bindParam("nombre", $this->di_nombre);
            $sql->bindParam("latitud", $this->di_latitud);
            $sql->bindParam("longitud", $this->di_longitud);
            $sql->execute();

            $res = $con->lastInsertId();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function buscar($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM direcciones where di_id = :id ");
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
            $sql = $con->prepare("SELECT * FROM direcciones where di_id = :id ");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
