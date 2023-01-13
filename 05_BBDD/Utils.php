<?php

class Utils
{
    static public function genera_tabla(array $datos, string $titulo): string
    {
        $titulo = strtolower($titulo);
        $tituloFormat = ucfirst($titulo);

        $tabla = "<table>";
        $tabla .= "<caption>$tituloFormat</caption>";
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
            $tabla .= "<input type='hidden' name='tabla' value='$titulo'>"
                . "<input type='hidden' name='cod' value='$fila[cod]'>"
                . "<td><input type='submit' value='Editar'></td>";
            $tabla .= "</form>";
            $tabla .= "</tr>";
        }
        $tabla .= "</table>";
        return $tabla;
    }
    static public function genera_formulario(string $tabla, array $datos): string
    {
        $cod = $datos['cod'];
        unset($datos['cod']);
        $tabla = strtolower($tabla);
        $tablaFormat = ucfirst($tabla);
        $form = "<h1>Editar $tablaFormat</h1>"
            . "<form action='guardar.php' method='post'>";
        foreach ($datos as $campo => $valor) {
            if ($campo == "cod") {
                // cod es el campo clave, readonly
                $form .= "<label for='$campo'>$campo</label>"
                    . "<input type='text' name='$campo' id='$campo' value='$valor' readonly>";
            } else {
                $form .= "<label for='$campo'>$campo</label>"
                    . "<input type='text' name='$campo' id='$campo' value='$valor'>";
            }
        }
        $form .= "<input type='hidden' name='tabla' value='$tabla'>"
            . "<input type='submit' value='Guardar'>"
            . "</fieldset>"
            . "</form>";
        return $form;
    }
}
