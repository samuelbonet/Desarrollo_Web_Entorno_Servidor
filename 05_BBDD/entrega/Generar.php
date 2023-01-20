<?php
class Generar{
    public static function tabla(String $tabla):string {
        $db = new Database();
        $tableData = $db->obtener_tabla($tabla);
        $html = "<table>"
              . "<thead>"
              . "<tr>";
        foreach ($tableData[0] as $key => $value) {
            $html .= "<th>$key</th>";
        }

        $html .="<th>Editar</th>"
               . "<th>Borrar</th>"
               . "</tr>"
               . "</thead>";
        foreach ($tableData as $row) {
            $html .= "<tr>";
            foreach ($row as $key => $value) {
                $html .= "<td>$value</td>";
            }
            // si pk no tiene coma es que solo hay una primary key
            $pk = $db->get_primary_key($tabla);
            if ($pk != null && strpos($pk, ",") === false) {
                $html .= "<td><a href='editar.php?table=$tabla&$pk=$row[$pk]'>Editar</a></td>"
                   . "<td><a href='borrar.php?table=$tabla&$pk=$row[$pk]'>Borrar</a></td>"
                   . "</tr>";
            }
            //sino hay que separar las primary keys
            else {
                $pk = explode(",", $pk);
                $html .= "<td><a href='editar.php?table=$tabla&";
                foreach ($pk as $key => $value) {
                    $html .= "$value=$row[$value]&";
                }
                $html = substr($html, 0, -1);
                $html .= "'>Editar</a></td>"
                   . "<td><a href='borrar.php?table=$tabla&";
                   foreach ($pk as $key => $value) {
                    $html .= "$value=$row[$value]&";
                }
                $html = substr($html, 0, -1);
                $html .= "'>Borrar</a></td>"
                   . "</tr>";

            }

            
        }
        $html .= "</table>";
        return $html;
    }
    public static function EditForm(String $tabla, array $datos){
        
        
    }
}