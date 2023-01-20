<?php

class Generar
{
    public static function tabla(string $tabla): string
    {
        $db = new Database();
        $tableData = $db->get_table($tabla);
        $html = "<table>" . "<thead>" . "<tr>";
        foreach ($tableData[0] as $key => $value) {
            $html .= "<th>$key</th>";
        }

        $html .= "<th>Editar</th>" . "<th>Borrar</th>" . "</tr>" . "</thead>";
        foreach ($tableData as $row) {
            $html .= "<tr>";
            foreach ($row as $key => $value) {
                $html .= "<td>$value</td>";
            }
            $pk = $db->get_primary_key($tabla);
            if ($pk != null && strpos($pk, ",") === false) {
                $html .= "<td><a href='editar.php?table=$tabla&$pk=$row[$pk]'>Editar</a></td>" . "<td><a href='borrar.php?table=$tabla&$pk=$row[$pk]'>Borrar</a></td>" . "</tr>";
            } else {
                $pk = explode(",", $pk);
                $html .= "<td><a href='editar.php?table=$tabla&";
                foreach ($pk as $key => $value) {
                    $html .= "$value=$row[$value]&";
                }
                $html = substr($html, 0, -1);
                $html .= "'>Editar</a></td>" . "<td><a href='borrar.php?table=$tabla&";
                foreach ($pk as $key => $value) {
                    $html .= "$value=$row[$value]&";
                }
                $html = substr($html, 0, -1);
                $html .= "'>Borrar</a></td>" . "</tr>";

            }
        }
        $html .= "<tr>" . "<td colspan='" . (sizeof($tableData[0]) + 2) . "'><a href='insert.php?table=$tabla'>Insertar nuevo registro</a></td>" . "</tr>";
        $html .= "</table>";
        return $html;
    }

    public static function EditForm(string $tabla, array $datos)
    {


    }
}