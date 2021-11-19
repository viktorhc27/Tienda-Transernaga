<?php
class Ventas
{
    private  $tipo_armado, $ven_codigo, $usuarios_id, $productos_pro_id, $ven_id, $ven_total, $ven_cantidad, $create_time, $update_time, $estados_id;
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
            $sql = $con->prepare("insert into ventas ("
                . "usuarios_us_id,"
                . "productos_pro_id, "
                . "venta_id, "
                . "ven_total, "
                . "ven_codigo,"
                . "tipo_armado,"
                . "ven_cantidad, "
                . "create_time,"
                . "update_time,"
                . "estados_id"
                . ")"
                . "values("
                . ":usuarios_id, "
                . ":productos_id, "
                . ":ven_id, "
                . ":ven_total, "
                . ":ven_codigo,"
                . ":tipo_armado,"
                . ":ven_cantidad, "
                . ":create_time, "
                . ":update_time,"
                . ":estados_id)");
            $sql->bindParam("usuarios_id", $this->usuarios_id);
            $sql->bindParam("productos_id", $this->productos_pro_id);
            $sql->bindParam("ven_id", $this->ven_id);
            $sql->bindParam("tipo_armado", $this->tipo_armado);
            $sql->bindParam("ven_total", $this->ven_total);
            $sql->bindParam("ven_codigo", $this->ven_codigo);
            $sql->bindParam("ven_cantidad", $this->ven_cantidad);
            $sql->bindParam("create_time", $this->create_time);
            $sql->bindParam("update_time", $this->update_time);
            $sql->bindParam("estados_id", $this->estados_id);


            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function leer()
    {
        try {

            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("SELECT * FROM ventas");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function mis_pedidos($id)
    {
        try {

            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("SELECT * FROM ventas where usuario_id= $id");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function modificar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("update ventas usuarios_id=:usuarios_id, productos_id= :productos_id, ven_total=:ven_total, ven_cantidad=:ven_cantidad, create_time=:create_time, update_time=:update_time set  WHERE ven_id = :id");
            $sql->bindParam("ven_id", $this->ven_id);
            $sql->bindparam("usuarios_id", $this->us_id);
            $sql->bindparam("productos_id", $this->productos_id);
            $sql->bindparam("ven_total", $this->ven_total);
            $sql->bindparam("ven_cantidad", $this->ven_cantidad);
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

    public function buscar($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM ventas WHERE ven_id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function cambiar_estado()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("UPDATE ventas SET estados_id = estados_id + 1 WHERE ven_codigo = :codigo");
            $sql->bindParam(":codigo", $this->ven_codigo);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
