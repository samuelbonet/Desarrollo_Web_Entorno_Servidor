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
        return $data;
    }

    
}
