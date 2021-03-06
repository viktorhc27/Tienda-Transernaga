<?php
class Productos
{

    private $pro_id, $pro_codigo, $pro_nombre, $pro_precio_venta, $pro_precio_compra, $pro_modelo, $pro_altura, $pro_ancho, $pro_profundidad, $pro_descripcion, $pro_peso, $pro_stock, $pro_img, $pro_color, $pro_estado, $create_time, $update_time, $categoria_cat_id, $marcas_mar_id;


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
            $sql = $con->prepare("insert into productos ("
                . "pro_id,"
                . "pro_codigo, "
                . "pro_nombre, "
                . "pro_precio_venta, "
                . "pro_precio_compra, "
                . "pro_modelo, "
                . "pro_altura, "
                . "pro_ancho, pro_profundidad, "
                . "pro_descripcion, "
                . "pro_peso, "
                . "pro_stock, "
                . "pro_img,"
                . "pro_color, "
                . "pro_estado, "
                . "create_time, update_time,categorias_cat_id,marcas_mar_id)"

                . "values("
                . ":pro_id,"
                . ":pro_codigo, "
                . ":pro_nombre, "
                . ":pro_precio_venta, "
                . ":pro_precio_compra, "
                . ":pro_modelo, "
                . ":pro_altura, "
                . ":pro_ancho, :pro_profundidad, "
                . ":pro_descripcion, "
                . ":pro_peso, "
                . ":pro_stock, "
                . ":pro_img,"
                . ":pro_color, "
                . ":pro_estado, "
                . ":create_time, :update_time, :categoria_cat_id, :marcas_mar_id)");
            $sql->bindParam("pro_id", $this->pro_id);
            $sql->bindParam("pro_codigo", $this->pro_codigo);
            $sql->bindParam("pro_nombre", $this->pro_nombre);
            $sql->bindParam("pro_precio_venta", $this->pro_precio_venta);
            $sql->bindParam("pro_precio_compra", $this->pro_precio_compra);
            $sql->bindParam("pro_modelo", $this->pro_modelo);
            $sql->bindParam("pro_altura", $this->pro_altura);
            $sql->bindParam("pro_ancho", $this->pro_ancho);
            $sql->bindParam("pro_profundidad", $this->pro_profundidad);

            $sql->bindParam("pro_descripcion", $this->pro_descripcion);
            $sql->bindParam("pro_peso", $this->pro_peso);
            $sql->bindParam("pro_stock", $this->pro_stock);
            $sql->bindParam("pro_img", $this->pro_img);
            $sql->bindParam("pro_color", $this->pro_color);
            $sql->bindParam("pro_estado", $this->pro_estado);

            $sql->bindParam("create_time", $this->create_time);
            $sql->bindParam("update_time", $this->update_time);

            $sql->bindParam("categoria_cat_id", $this->categoria_cat_id);
            $sql->bindParam("marcas_mar_id", $this->marcas_mar_id);


            $sql->execute();
            $res = $con->lastInsertId();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function modificar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("update productos set pro_codigo=:pro_codigo, pro_nombre=:pro_nombre, pro_precio_venta=:pro_precio_venta, pro_precio_compra= :pro_precio_compra, pro_modelo =:pro_modelo, pro_altura=:pro_altura, pro_ancho =:pro_ancho, pro_profundidad=:pro_profundidad, pro_descripcion =:pro_descripcion,pro_peso =:pro_peso, pro_stock=:pro_stock, pro_img=:pro_img, pro_color=:pro_color, pro_estado=:pro_estado, create_time=:create_time, update_time=:update_time, categoria_cat_id=:categoria_cat_id, marcas_mar_id:marcas:mar_id  WHERE pro_id = :id");

            $sql->bindParam("pro_id", $this->pro_id);
            $sql->bindParam("pro_codigo", $this->pro_codigo);
            $sql->bindParam("pro_nombre", $this->pro_nombre);
            $sql->bindParam("pro_precio_venta", $this->pro_precio_venta);
            $sql->bindParam("pro_precio_compra", $this->pro_precio_compra);
            $sql->bindParam("pro_modelo", $this->pro_modelo);
            $sql->bindParam("pro_altura", $this->pro_altura);
            $sql->bindParam("pro_ancho", $this->pro_ancho);
            $sql->bindParam("pro_profundidad", $this->pro_profundidad);

            $sql->bindParam("pro_descripcion", $this->pro_descripcion);
            $sql->bindParam("pro_peso", $this->pro_peso);
            $sql->bindParam("pro_stock", $this->pro_stock);
            $sql->bindParam("pro_img", $this->pro_img);
            $sql->bindParam("pro_color", $this->pro_color);
            $sql->bindParam("pro_estado", $this->pro_estado);

            $sql->bindParam("create_time", $this->create_time);
            $sql->bindParam("update_time", $this->update_time);

            $sql->bindParam("categoria_cat_id", $this->categoria_cat_id);
            $sql->bindParam("marcas_mar_id", $this->marcas_mar_id);


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
            $sql = $con->prepare("SELECT * FROM productos WHERE pro_id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function verificar_productos($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM productos WHERE pro_id = $id");

            $sql->execute();
            if ($sql->rowCount() == 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function buscar_palabras($nombre, $empieza, $por_pagina)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM productos WHERE pro_nombre LIKE :nombre LIMIT $empieza, $por_pagina");
            $keyword = "%" . $nombre . "%";
            $sql->bindParam(':nombre', $keyword);
            $sql->execute();
            $res = $sql->fetchall();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function leer()
    {

        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from productos");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function leer_categorias($id)
    {

        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from productos where categorias_cat_id = $id");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function leer_assoc()
    {

        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM productos ORDER BY create_time DESC");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function paginacion($empieza, $por_pagina)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM productos WHERE pro_estado = 1 LIMIT $empieza, $por_pagina");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function listar_categorias($cat, $empieza, $por_pagina)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM productos where categorias_cat_id = $cat AND pro_estado = 1 LIMIT $empieza, $por_pagina");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function verificar_stock($cantidad, $id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("UPDATE productos SET pro_stock = pro_stock - $cantidad WHERE pro_id = $id");
            $sql->execute();
            $res = $sql->rowCount();
            if ($res == 1) {
                $sql = $con->prepare("SELECT pro_stock FROM productos  WHERE pro_id = $id");
                $sql->execute();
                $res = $sql->fetch();
                if ($res['pro_stock'] >= 0) {
                    return true;
                } else {
                    $sql = $con->prepare("UPDATE productos SET pro_stock = pro_stock + $cantidad WHERE pro_id = $id");
                    $sql->execute();
                    return false;
                }
            } else {
                return $res;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function devolver($cantidad, $id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("UPDATE productos SET pro_stock = pro_stock + $cantidad WHERE pro_id = $id");
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function cambiar_estado($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT pro_estado from productos WHERE pro_id = $id");
            $sql->execute();
            $res = $sql->fetch();
            if ($res['pro_estado'] == 1) {
                $sql = $con->prepare("UPDATE productos SET pro_estado = 0 WHERE pro_id = $id");
                $sql->execute();
                return false;
            } else {
                $sql = $con->prepare("UPDATE productos SET pro_estado = 1 WHERE pro_id = $id");
                $sql->execute();
                return true;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function categorias_productos($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * from productos WHERE categorias_cat_id = $id");
            $sql->execute();
            $res = $sql->fetch();
            if ($res['pro_estado'] == 1) {
                $sql = $con->prepare("UPDATE * SET pro_estado = 0 WHERE categorias_cat_id = $id");
                $sql->execute();
                return false;
            } else {
                $sql = $con->prepare("UPDATE * SET pro_estado = 1 WHERE categorias_cat_id = $id");
                $sql->execute();
                return true;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function stock($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT pro_stock from productos WHERE pro_id = $id");
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function agregar_stock($id, $cantidad)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT pro_stock from productos WHERE pro_id = $id");
            $sql->execute();
            $res = $sql->fetch();
            if ($res['pro_stock'] > 0) {
                $sql = $con->prepare("UPDATE productos SET pro_stock = pro_stock + $cantidad WHERE pro_id = $id");
                $r = $sql->execute();
                return $r;
            } else {
                $sql = $con->prepare("UPDATE productos SET pro_stock = $cantidad WHERE pro_id = $id");
                $r = $sql->execute();
                return $r;
            }
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function quitar($id, $cantidad)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("UPDATE productos SET pro_stock = pro_stock - $cantidad WHERE pro_id = $id");
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function reporte_inventario($orden)
    {
        try {
            $con = (new Conexion())->Conectar();
            if ($orden == "1") {
                $sql = $con->prepare("SELECT * FROM productos ORDER BY pro_nombre ASC");
                $sql->execute();
                $res = $sql->fetchAll();
                return $res;
            }
            if ($orden == "2") {
                $sql = $con->prepare("SELECT * FROM productos ORDER BY pro_nombre DESC");
                $sql->execute();
                $res = $sql->fetchAll();
                return $res;
            }
            if ($orden == "3") {
                $sql = $con->prepare("SELECT * FROM productos ORDER BY pro_stock ASC");
                $sql->execute();
                $res = $sql->fetchAll();
                return $res;
            }
            if ($orden == "4") {
                $sql = $con->prepare("SELECT * FROM productos ORDER BY pro_stock DESC");
                $sql->execute();
                $res = $sql->fetchAll();
                return $res;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function buscar_id($codigo)
    {

        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT pro_id FROM productos WHERE pro_codigo = '$codigo'");
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function verificar_codigo($codigo)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM productos WHERE pro_codigo like :codigo");
            $keyword = "%" . $codigo . "%";
            $sql->bindParam(':codigo', $keyword);
            $sql->execute();
            if ($sql->rowCount() == 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }


    public function desactivar($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("UPDATE productos SET pro_estado = 0 WHERE categorias_cat_id = $id");
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function activar($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("UPDATE productos SET pro_estado = 1 WHERE categorias_cat_id = $id");
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function autocompletar($titulo)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT pro_codigo FROM productos WHERE pro_codigo LIKE '%" . $titulo . "%' ORDER BY pro_codigo ASC LIMIT 7");
            $sql->execute();

            while ($res = $sql->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $res['pro_codigo'];
            }

            echo json_encode($data);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
