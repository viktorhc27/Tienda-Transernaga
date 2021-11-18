<?php
class Usuarios
{
    private $us_id, $us_nombre, $us_apellApp, $us_apellApm, $us_telefono, $us_correo, $us_password, $us_direccion, $us_sexo, $create_time, $update_time, $roles_ro_id;

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
    public function agregar_()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("insert into usuarios ("
                . "us_id,"
                . "us_nombre, "
                . "us_apellApp, "
                . "us_apellApm, "
                . "us_telefono, "
                . "us_correo, "
                . "us_password, "
                . "us_direccion,"
                . "us_sexo, "
                . "create_time,"
                . " update_time,"
                . "roles_ro_id)"

                . "values("
                . ":id, "
                . ":nombre, "
                . ":apellApp, "
                . ":apellApm, "
                . ":telefono, "
                . ":correo, "
                . ":password, "
                . ":direccion,"
                . ":sexo,"
                . ":create_time, "
                . ":update_time,"
                . ":roles_ro_id)");
            $sql->bindParam("id", $this->us_id);
            $sql->bindParam("nombre", $this->us_nombre);
            $sql->bindParam("apellApp", $this->us_apellApp);
            $sql->bindParam("apellApm", $this->us_apellApm);
            $sql->bindParam("telefono", $this->us_telefono);
            $sql->bindParam("correo", $this->us_correo);
            $sql->bindParam("password", $this->us_password);
            $sql->bindParam("direccion", $this->us_direccion);
            $sql->bindParam("sexo", $this->us_sexo);
            $sql->bindParam("create_time", $this->create_time);
            $sql->bindParam("update_time", $this->update_time);
            $sql->bindParam("roles_ro_id", $this->roles_ro_id);
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
            $sql = $con->prepare("insert into usuarios ("
                . "us_id,"
                . "us_nombre, "
                . "us_apellApp, "
                . "us_apellApm, "
                . "us_telefono, "
                . "us_correo, "
                . "us_password, "
                . "us_direccion,"
                . "us_sexo, "
                . "create_time,"
                . " update_time,"
                . "roles_ro_id)"

                . "values("
                . ":id, "
                . ":nombre, "
                . ":apellApp, "
                . ":apellApm, "
                . ":telefono, "
                . ":correo, "
                . ":password, "
                . ":direccion,"
                . ":sexo,"
                . ":create_time, "
                . ":update_time,"
                . ":roles_ro_id)");
            $sql->bindParam("id", $this->us_id);
            $sql->bindParam("nombre", $this->us_nombre);
            $sql->bindParam("apellApp", $this->us_apellApp);
            $sql->bindParam("apellApm", $this->us_apellApm);
            $sql->bindParam("telefono", $this->us_telefono);
            $sql->bindParam("correo", $this->us_correo);
            $sql->bindParam("password", $this->us_password);
            $sql->bindParam("direccion", $this->us_direccion);
            $sql->bindParam("sexo", $this->us_sexo);
            $sql->bindParam("create_time", $this->create_time);
            $sql->bindParam("update_time", $this->update_time);
            $sql->bindParam("roles_ro_id", $this->roles_ro_id);
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
            $sql = $con->prepare("update usuarios set "
                . " us_nombre=:nombre,"
                . " us_apellApp=:app,"
                . " us_apellapm=:apm,"
                . " us_telefono=:telefono , "
                . " us_correo=:correo,"
                . " us_direccion=:direccion,"
                . " roles_ro_id=:roles WHERE us_id = :id");

            $sql->bindparam("id", $this->us_id);
            $sql->bindparam("nombre", $this->us_nombre);
            $sql->bindparam("app", $this->us_apellApp);
            $sql->bindparam("apm", $this->us_apellApm);
            $sql->bindparam("telefono", $this->us_telefono);
            $sql->bindparam("correo", $this->us_correo);
            $sql->bindparam("direccion", $this->us_direccion);
            $sql->bindparam("roles", $this->roles_ro_id);

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
            $sql = $con->prepare("SELECT * FROM usuarios WHERE us_id = :id");
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
            $sql = $con->prepare("select * from usuarios");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function listar_funcionarios()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from usuarios where roles_ro_id >= 2 ");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function login()
    {

        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM usuarios where us_correo = :correo");
            $sql->bindParam(':correo', $this->us_correo);
            $sql->execute();
            $res = $sql->fetch();

            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function verificar_correo()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM usuarios WHERE us_correo = :correo");
            $sql->bindParam(':correo', $this->us_correo);
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
    public function verificar_usuario($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM usuario WHERE id = $id");
           
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
}
