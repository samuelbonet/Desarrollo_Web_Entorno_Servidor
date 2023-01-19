<?php
class Database  
{
    private mysqli $conn;
    public function __construct()
    {
        try {
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        } catch (Exception $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }
    public function valida_usuario(String $usuario, String $password)
    {
        $sql = "SELECT * FROM usuarios WHERE user = '$usuario' AND pass = '$password'";
        $result = $this
            ->conn
            ->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function get_tablas(): array
    {
        $tablas = [];
        $consulta = "SHOW TABLES";
        $resultado = $this->conn->query($consulta);
        $fila = $resultado->fetch_assoc();
        while ($fila) {
            $tablas[] = $fila;
            $fila = $resultado->fetch_assoc();
            if ($fila['Tables_in_dwes'] == 'usuarios') {
                unset($fila['Tables_in_dwes']);
            }
            }


        return $tablas;
    }
    public function obtener_tabla(String $tabla): array
    {
        $tablaData = [];
        $consulta = "SELECT * FROM $tabla";
        $resultado = $this->conn->query($consulta);
        $fila = $resultado->fetch_assoc();
        while ($fila) {
            $tablaData[] = $fila;
            $fila = $resultado->fetch_assoc();
        }
        return $tablaData;
    }
    public function get_primary_key(String $tabla)
    {

        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = 'dwes' AND TABLE_NAME = '$tabla' AND CONSTRAINT_NAME = 'PRIMARY'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        while ($row) {
            $data[] = $row;
            $row = $result->fetch_assoc();
        }
            $pk = $data[0]['COLUMN_NAME'];
        //  Obtener todas las primary keys si hay más de una
         if (sizeof($data) > 1) {
             //concatenar las primary keys
             $pk = "";
             foreach ($data as $key => $value) {
                 $pk .= $value['COLUMN_NAME'] . ",";
             }
             $pk = substr($pk, 0, -1);
         }
        return $pk;
    }
    public function borrar_registro(String $tabla, array $datos):bool
    {
        $sql = "DELETE FROM $tabla WHERE ";
        if (sizeof($datos) > 1) {
            foreach ($datos as $dato => $value) {
                $sql .= "$dato = '$value' AND ";
            }
            $sql = substr($sql, 0, -4);
        }
        if (sizeof($datos) == 1) {
            foreach ($datos as $dato => $value) {
                $sql .= "$dato = '$value'";
            }
        }
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //FUNCTIONS FOR DEBUGGING
    public function sql(String $sql): string
    {
        $data = [];
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        while ($row) {
            $data[] = $row;
            $row = $result->fetch_assoc();
        }
        var_dump($data);
    }

    
}
