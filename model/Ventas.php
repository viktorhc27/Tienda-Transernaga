<?php
class Ventas
{
    private  $tipo_armado, $ven_codigo, $usuarios_id, $productos_pro_id, $venta_id, $ven_total, $ven_cantidad, $create_time, $update_time, $estados_id, $id_direccion;
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
                . "estados_id, direcciones_di_id"
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
                . ":estados_id,:direcciones_di_id)");
            $sql->bindParam("usuarios_id", $this->usuarios_id);
            $sql->bindParam("productos_id", $this->productos_pro_id);
            $sql->bindParam("ven_id", $this->venta_id);
            $sql->bindParam("tipo_armado", $this->tipo_armado);
            $sql->bindParam("ven_total", $this->ven_total);
            $sql->bindParam("ven_codigo", $this->ven_codigo);
            $sql->bindParam("ven_cantidad", $this->ven_cantidad);
            $sql->bindParam("create_time", $this->create_time);
            $sql->bindParam("update_time", $this->update_time);
            $sql->bindParam("estados_id", $this->estados_id);
            $sql->bindParam("direcciones_di_id", $this->direcciones_di_id);


            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function ventas()
    {
        try {

            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("SELECT * FROM ventas where estados_id <=6");
            $sql->execute();
            $res = $sql->fetchAll();
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
    public function leer_pendientes()
    {
        try {

            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("SELECT * FROM ventas where estados_id <=3");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function _leer_repartos()
    {
        try {

            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("SELECT * FROM ventas where estados_id  =4");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function leer_repartos()
    {
        try {

            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("SELECT * FROM ventas where estados_id  >=4");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function leer_cargar()
    {
        try {

            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("SELECT * FROM ventas WHERE estados_id = 4");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function recibidos()
    {
        try {

            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("SELECT * FROM ventas WHERE estados_id = 6");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function leer_reparto()
    {
        try {

            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("SELECT * FROM ventas WHERE estados_id BETWEEN '5' AND '6'");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function ventas_pendientes()
    {
        try {

            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("SELECT * FROM ventas where estados_id = 1");
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

            $sql = $con->prepare("SELECT * FROM ventas where usuarios_us_id= $id");
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
            $sql = $con->prepare("update ventas usuarios_id=:usuarios_id, productos_id= :productos_id, ven_total=:ven_total, ven_cantidad=:ven_cantidad, create_time=:create_time, update_time=:update_time , direcciones_di_id=:direcciones_di_id set  WHERE ven_id = :id");
            $sql->bindParam("ven_id", $this->venta_id);
            $sql->bindparam("usuarios_id", $this->us_id);
            $sql->bindparam("productos_id", $this->productos_id);
            $sql->bindparam("ven_total", $this->ven_total);
            $sql->bindparam("ven_cantidad", $this->ven_cantidad);
            $sql->bindparam("create_time", $this->create_time);
            $sql->bindparam("update_time", $this->update_time);
            $sql->bindparam("direcciones_di_id", $this->direcciones_di_id);

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

    public function listar($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM ventas WHERE venta_id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $res = $sql->fetchAll();
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
    public function ventas_hoy($ayer)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from ventas where create_time >= '$ayer'");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function buscar_x_fecha($fecha1, $fecha2)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * from ventas where create_time >= $fecha1 and create_time < $fecha2");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function Reportes_total($hoy)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare(" SELECT count(venta_id) AS cantidad_ventas,"
                . "SUM(ven_total) AS total_ventas,"
                . "(SELECT SUM(pro_precio_compra) FROM productos WHERE productos.pro_id = ventas.productos_pro_id )as costo_ventas,"
                . "SUM(ven_total)-(SELECT SUM(pro_precio_compra) FROM productos WHERE productos.pro_id = ventas.productos_pro_id)"
                . "as ganancias FROM ventas WHERE create_time >= '$hoy' && estados_id <='6'");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function reporte_entre_fecha($inicio, $final)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare(" SELECT count(venta_id) AS cantidad_ventas,"
                . "SUM(ven_total) AS total_ventas,"
                . "(SELECT SUM(pro_precio_compra) FROM productos WHERE productos.pro_id = ventas.productos_pro_id )as costo_ventas,"
                . "SUM(ven_total)-(SELECT SUM(pro_precio_compra) FROM productos WHERE productos.pro_id = ventas.productos_pro_id)"
                . "as ganancias FROM ventas WHERE create_time BETWEEN '$inicio' AND (SELECT DATE_ADD('$final', INTERVAL 1 DAY))");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function grafico($fecha)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT COUNT(*) as valor FROM ventas WHERE create_time > '$fecha' and create_time < (SELECT DATE_ADD('$fecha', INTERVAL 1 DAY));");
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function grafico_year($anho)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT COUNT(*) as valor FROM ventas WHERE create_time > '$anho' and create_time < (SELECT DATE_ADD('$anho', INTERVAL 1 year));");
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
