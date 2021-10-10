<?php
class ProductosImagenes
{

    private $imagenes_id, $producto_id, $productos_imagenes_id;

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
            $sql = $con->prepare("insert into productos_has_imagen (productos_pro_id,imagen_img_id, productos_imagenes_id)values(:productos,:imagenes,:id)");
            $sql->bindParam("productos", $this->producto_id);
            $sql->bindParam("imagenes", $this->imagenes_id);
            $sql->bindParam("id", $this->productos_imagenes_id);
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
            $sql = $con->prepare("update productos_has_imagen set productos_pro_id=:productos,imagen_img_id=:imagenes  where productos_img_id= :id");
            $sql->bindParam("productos", $this->producto_id);
            $sql->bindParam("imagenes", $this->imagenes_id);
            $sql->bindParam("id", $this->productos_imagenes_id);

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
            $sql = $con->prepare("SELECT * FROM productos_has_imagen WHERE productos_img_id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function leer()
    {

        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from productos_has_imagen");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
