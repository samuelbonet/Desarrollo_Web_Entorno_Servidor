<?php
class Generar{
    public static function tabla(String $tabla):string {
        $db = new Database();
        $data = $db->obtener_tabla($tabla);
        $html = "<table border='1'>"
              . "<thead>"
              . "<tr>";
        foreach ($data[0] as $key => $value) {
            $html .= "<th>$key</th>";
        }

        $html .="<th>Editar</th>"
               . "<th>Borrar</th>"
               . "</tr>"
               . "</thead>";
        foreach ($data as $row) {
            $html .= "<tr>";
            foreach ($row as $key => $value) {
                $html .= "<td>$value</td>";
            }
            $html .= "</tr>";
        }
        $html .= "</table>";
        return $html;
    }
}