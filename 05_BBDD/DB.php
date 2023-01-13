<?php
class DB
{
    private mysqli $conn;
    public function  __construct()
    {
        try {
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        } catch (Exception $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }
    public function get_tablas(): array
    {
        $tablas = [];
        $consulta = "show tables";
        $resultado = $this->conn->query($consulta);
        $fila = $resultado->fetch_assoc();
        while ($fila) {
            $tablas[] = $fila;
            $fila = $resultado->fetch_assoc();
        }
        return $tablas;
    }
    public function valida_usuario(String $usuario, String $password)
    {
        $sql = "SELECT * FROM usuarios WHERE nombre = '$usuario' AND password = '$password'";
        $result = $this
            ->conn
            ->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function obtener_tabla(String $tabla): array
    {
        $tablaData = [];
        $consulta = "select * from $tabla";
        $resultado = $this->conn->query($consulta);
        $fila = $resultado->fetch_assoc();
        while ($fila) {
            $tablaData[] = $fila;
            $fila = $resultado->fetch_assoc();
        }
        return $tablaData;
    }
    public function obtener_fila(String $tabla, String $cod): array
    {
        $consulta = "select * from $tabla where cod = '$cod'";
        $resultado = $this->conn->query($consulta);
        $fila = $resultado->fetch_assoc();
        return $fila;
    }
    public function update_fila(String $tabla, array $datos): bool
    {
        $campos = array_keys($datos);
        $valores = array_values($datos);
        $consulta = "update $tabla set ";
        for ($i = 0; $i < count($campos); $i++) {
            $consulta .= "$campos[$i] = '$valores[$i]'";
            if ($i < count($campos) - 1) {
                $consulta .= ", ";
            }
        }
        $consulta .= " where cod = '$datos[cod]'";
        $this->conn->query($consulta);
        //si la consulta no se ejecuta correctamente, se muestra el error
        if ($this->conn->error) {
            echo $this->conn->error;
            return false;
        }
        return true;
    }
    public function insert_fila(String $tabla, array $datos)
    {
        $campos = array_keys($datos);
        $valores = array_values($datos);
        $consulta = "insert into $tabla (";
        for ($i = 0; $i < count($campos); $i++) {
            $consulta .= "$campos[$i]";
            if ($i < count($campos) - 1) {
                $consulta .= ", ";
            }
        }
        $consulta .= ") values (";
        for ($i = 0; $i < count($valores); $i++) {
            $consulta .= "'$valores[$i]'";
            if ($i < count($valores) - 1) {
                $consulta .= ", ";
            }
        }
        $consulta .= ")";
        $this->conn->query($consulta);
    }
    public function delete_fila(String $tabla, String $cod)
    {
        $consulta = "delete from $tabla where cod = '$cod'";
        $this->conn->query($consulta);
    }
}
