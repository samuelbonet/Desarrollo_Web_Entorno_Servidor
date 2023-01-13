<?php

class Utils
{
    static public function genera_tabla(array $datos, string $titulo): string
    {
        $tabla = "<table>";
        $tabla .= "<caption>$titulo</caption>";
        $fila = $datos[0];
        // Creo la cabecera de la tabla con los nombres de los campos
        $tabla .= "<tr>";
        foreach ($fila as $campo => $valor) {
            $tabla .= "<th>$campo</th>";
        }
        $tabla .= "<th>Editar</th>";
        $tabla .= "</tr>";
        foreach ($datos as $fila) {
            $tabla .= "<tr>";
            foreach ($fila as $campo => $valor) {
                $tabla .= "<td>$valor</td>";
            }
            $tabla .= "<form action='editar.php' method='post'>";
            $tabla .= "<input type='hidden' name='cod' value='$fila[cod]'>"
                . "<input type='hidden' name='tabla' value='$titulo'>"
                . "<td><input type='submit' value='Editar'></td>";
            $tabla .= "</form>";
            $tabla .= "</tr>";
        }
        $tabla .= "</table>";
        return $tabla;
    }
}
