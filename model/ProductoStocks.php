<?php
class ProductoStock
{
    private $productos_pro_id, $usuarios_us_id, $documento, $cantidad, $create_time, $update_time;

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
            $con = (new Conexion())->conectar();
            $sql = $con->prepare("INSERT INTO usuarios_stock ("
                . "productos_pro_id,"
                . "usuarios_us_id,"
                . "documento, cantidad,"
                . "create_time,"
                . "update_time) "
                . "values(:productos_id,:usuarios_id,:documento,:cantidad, :create_time,:update_time)");

            $sql->bindParam(":productos_id", $this->productos_pro_id);
            $sql->bindParam(":usuarios_id", $this->usuarios_us_id);
            $sql->bindParam(":documento", $this->documento);
            $sql->bindParam(":cantidad", $this->cantidad);
            $sql->bindParam(":create_time", $this->create_time);
            $sql->bindParam(":update_time", $this->update_time);
            $res =  $sql->execute();
            return $res;
        } catch (PDOException  $e) {
            return $e->getMessage();
        }
    }

    public function leer()
    {
        try {
            $con = (new Conexion())->conectar();
            $sql = $con->prepare("SELECT * FROM usuarios_stock");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException  $e) {
            return $e->getMessage();
        }
    }
    public function quitar($cantidad)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("INSERT INTO usuarios_stock ("
                . "productos_pro_id,"
                . "usuarios_us_id,"
                . "documento, cantidad,"
                . "create_time,"
                . "update_time) "
                . "values(:productos_id,:usuarios_id,:documento,:cantidad, :create_time,:update_time)");
            $sql->bindParam(":productos_id", $this->productos_pro_id);
            $sql->bindParam(":usuarios_id", $this->usuarios_us_id);
            $sql->bindParam(":documento", $this->documento);
            $sql->bindParam(":cantidad", $cantidad);
            $sql->bindParam(":create_time", $this->create_time);
            $sql->bindParam(":update_time", $this->update_time);
            $res =  $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
