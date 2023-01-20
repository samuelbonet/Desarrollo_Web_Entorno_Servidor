<?php

class Database
{
    /**
     * @var mysqli is used to store the connection to the database
     */
    private mysqli $conn;

    /**
     * Database constructor. It creates the connection to the database
     */
    public function __construct()
    {
        try {
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        } catch (Exception $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }

    /**
     * This function check the login to the website checking the user and password in the database and returning true if the user is valid
     * @param string $usuario is the user to check
     * @param string $password is the password to check
     * @return bool true if the user is valid. False otherwise
     */
    public function validate_user(string $usuario, string $password): bool
    {
        $sql = "SELECT * FROM dwes.usuarios WHERE user = '$usuario' AND pass = '$password'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function returns the list of tables in the database
     * @return array is the list of tables in the database
     */
    public function get_all_tables(): array
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

    /**
     * This function returns the data of a table
     * @param string $tabla is the name of the table to get the data
     * @return array is the data of the table
     */
    public function get_table(string $tabla): array
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

    /**
     * This function deletes a row from a table
     * @param string $tabla is the name of the table
     * @param array $datos is the data of the row to delete
     * @return bool true if the row is deleted. False otherwise
     */
    public function delete_entry(string $tabla, array $datos): bool
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

    /**
     * This function gets the data of a row from a table
     * @param string $tabla is the name of the table
     * @param array $pk is the primary key of the row
     * @return array $data Returns the data of the row
     */
    public function get_entry(string $tabla, array $pk):array
    {
        $sql = "SELECT * FROM $tabla WHERE ";
        if (sizeof($pk) > 1) {
            foreach ($pk as $dato => $value) {
                $sql .= "$dato = '$value' AND ";
            }
            $sql = substr($sql, 0, -4);
        }
        if (sizeof($pk) == 1) {
            foreach ($pk as $dato => $value) {
                $sql .= "$dato = '$value'";
            }
        }
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        while ($row) {
            $data[] = $row;
            $row = $result->fetch_assoc();
        }
        return $data;
    }

    /**
     * This function updates a row from a table
     * @param string $tabla is the name of the table
     * @param array $datos is the data of the row to update
     * @return bool true if the row is updated. False otherwise
     */
    public function update_entry(string $tabla, array $datos): bool
    {
        $pk = $this->get_primary_key($tabla);
        $pk = explode(",", $pk);
        /** @noinspection SqlWithoutWhere */
        $sql = "UPDATE $tabla SET ";
        if (sizeof($datos) > 1) {
            foreach ($datos as $dato => $value) {
                $sql .= "$dato = '$value', ";
            }
            $sql = substr($sql, 0, -2);
        }
        if (sizeof($datos) == 1) {
            foreach ($datos as $dato => $value) {
                $sql .= "$dato = '$value'";
            }
        }
        $sql .= " WHERE ";
        foreach ($pk as $key => $value) {
            $sql .= "$value = '$datos[$value]' AND ";
        }
        $sql = substr($sql, 0, -4);
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function gets the primary keys of a table
     * @param string $tabla is the name of the table
     * @return mixed|string
     */
    public function get_primary_key(string $tabla): string
    {

        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = 'dwes' AND TABLE_NAME = '$tabla' AND CONSTRAINT_NAME = 'PRIMARY'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        while ($row) {
            $data[] = $row;
            $row = $result->fetch_assoc();
        }
        $pk = "";
        foreach ($data as $key => $value) {
            $pk .= $value['COLUMN_NAME'] . ",";
        }
        $pk = substr($pk, 0, -1);

        return $pk;
    }

    /**
     * @param string $tabla
     * @param array $datos
     * @return bool
     */
    public function insert_entry(string $tabla, array $datos): bool
    {
        $sql = "INSERT INTO $tabla (";
        foreach ($datos as $dato => $value) {
            $sql .= "$dato, ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= ") VALUES (";
        foreach ($datos as $dato => $value) {
            $sql .= "'$value', ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= ")";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //FUNCTIONS FOR DEBUGGING

    /**
     * @param string $sql
     * @return array
     */
    public function sql(string $sql)
    {
        $data = [];
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        while ($row) {
            $data[] = $row;
            $row = $result->fetch_assoc();
        }
        var_dump($data);
        return $data;
    }


}
