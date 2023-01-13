<?php

class DB
{
    private mysqli $conn;
    public function  __construct()
    {
        try {
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            echo "Conexión exitosa";
        } catch (Exception $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }
    public function valida_usuario(String $usuario, String $password)
    {
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
        $result = $this
            ->conn
            ->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function obtener_familias(): array
    {
        $familias = [];
        $consulta = "select * from familia";
        $resultado = $this->conn->query($consulta);
        $fila = $resultado->fetch_assoc();
        while ($fila) {
            $familias[] = $fila;
            $fila = $resultado->fetch_assoc();
        }
        return $familias;
    }
}
