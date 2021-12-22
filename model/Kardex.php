<?php
class Kardex
{
    private $id;
    private $tipo;
    private $descripcion;
    private $unidades;

    private $fecha;
    private $pro_id;


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
            $sql = $con->prepare("insert into kardex (kar_id,tipo, descripcion, unidades,fecha,pro_id)values(:id, :tipo, :descripcion, :unidades, :fecha,:pro_id)");
            $sql->bindParam("id", $this->id);
            $sql->bindParam("tipo", $this->tipo);
            $sql->bindParam("descripcion", $this->descripcion);
            $sql->bindParam("unidades", $this->unidades);
            $sql->bindParam("fecha", $this->fecha);
            $sql->bindParam("pro_id", $this->pro_id);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function kardex()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT pro_id,"
                . "pro_stock,"
                . "pro_precio_compra,"
                . "pro_precio_compra * pro_stock as 'costo_total',"
                . "(SELECT sum(ventas.ven_cantidad) FROM ventas WHERE ventas.productos_pro_id = :id )as 'unidades vendidas',"
                . "pro_precio_venta as 'costopor venta',"
                . "pro_precio_venta* (SELECT sum(ventas.ven_cantidad) FROM ventas WHERE ventas.productos_pro_id = :id ) as 'ganancia'"
                . ", pro_stock +(SELECT sum(ventas.ven_cantidad) FROM ventas WHERE ventas.productos_pro_id = :id) as 'unidad global' FROM productos WHERE pro_id = :id");
            $sql->bindParam("id", $this->id);
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function lista_kardex($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            
            $sql = $con->prepare("SELECT kar_id, tipo,descripcion,unidades,date_format(fecha, '%d/%m/%Y  %H:%m:%s') as fecha,pro_id, (SELECT kardex.unidades * productos.pro_precio_venta FROM productos WHERE productos.pro_id= '$id' )as saldo FROM kardex where pro_id = :id");
            $sql->bindParam("id", $this->id);
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
