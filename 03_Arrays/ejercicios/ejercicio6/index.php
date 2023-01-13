<?php

if (($_POST['submit']) == 'Enviar') {
    $lechuga = $_POST['Lechuga'];
    $tomates = $_POST['Tomates'];
    $cebollas = $_POST['Cebollas'];
    $fresas = $_POST['Fresas'];
    $manzanas = $_POST['Manzanas'];
    $inventario = [
        $lechuga => [
            'icono' => $_POST['iconLechuga'],
            'unidades' => $_POST['LechugaUdsDisponibles'],
            'precio' => $_POST['precioLechuga'],

        ],
        $tomates => [
            'icono' => $_POST['iconTomates'],

            'unidades' => $_POST['TomatesUdsDisponibles'],
            'precio' => $_POST['precioTomates'],
        ],
        $cebollas => [
            'icono' => $_POST['iconCebollas'],
            'unidades' => $_POST['CebollasUdsDisponibles'],
            'precio' => $_POST['precioCebollas'],
        ],
        $fresas => [
            'icono' => $_POST['iconFresas'],
            'unidades' => $_POST['FresasUdsDisponibles'],
            'precio' => $_POST['precioFresas'],
        ],
        $manzanas => [
            'icono' => $_POST['iconManzanas'],
            'unidades' => $_POST['ManzanasUdsDisponibles'],
            'precio' => $_POST['precioManzanas'],
        ],

    ];

    $pedido = [
        $lechuga => $_POST['LechugaUdsPedidas'],
        $tomates => $_POST['TomatesUdsPedidas'],
        $cebollas => $_POST['CebollasUdsPedidas'],
        $fresas => $_POST['FresasUdsPedidas'],
        $manzanas => $_POST['ManzanasUdsPedidas']
    ];
    $totalCompra = 0;

    foreach ($pedido as $producto => $uds) {
        if ($uds > $inventario[$producto]['unidades']) {
            $pedido[$producto] = $inventario[$producto]['unidades'];
        }
    }
    foreach ($pedido as $producto => $uds) {
        if ($uds > 0) {
            $total = $uds * $inventario[$producto]['precio'];
            $totalCompra += $total;
            echo "<tr>
                    <td>{$inventario[$producto]['icono']}</td>
                    <td>$producto</td>
                    <td>$uds</td>
                    <td>{$inventario[$producto]['precio']}</td>
                    <td>$total</td>
                    </tr>";
        }
    }
    echo "<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Confirmar compra</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>

</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Icono</th>
                <th>Producto</th>
                <th>Unidades deseadas</th>
                <th>Precio (€/ud)</th>
                <th>Total</th>
        </thead>
        <tbody>";
    echo "
            <tr>
                <td colspan='5'>
                    <input type='submit' value='enviar' >Confirmar compra    $totalCompra  y Volver</input>
                </td>
                <td>
                </td>
            </tr>
            </form>
        </tbody>

        </table>
</body>

</html>";
}
// Si estoy cargando la pagina desde URL
if (!isset($_POST['submit'])) {
    $inventario = [
        "Lechuga" => [
            "unidades" => 200,
            "precio" => 0.90,
            "icono" => '🥬'
        ],
        "Tomates" => [
            "unidades" => 2000,
            "precio" => 2.15,
            "icono" => '🍅'
        ],
        "Cebollas" => [
            "unidades" => 3200,
            "precio" => 0.49,
            "icono" => '🧅'
        ],
        "Fresas" => [
            "unidades" => 4800,
            "precio" => 4.50,
            "icono" => '🍓'
        ],
        "Manzanas" => [
            "unidades" => 2500,
            "precio" => 2.10,
            "icono" => '🍎'
        ],
    ];
    echo " <!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Tienda</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>

</head>

<body>
    Productos
    <form action='index.php' method='post'>
        <table>
            <thead>
                <tr>
                    <th>Icono</th>
                    <th>Producto</th>
                    <th>Unidades deseadas</th>
                    <th>Precio (€/ud)</th>
                    <th>Total</th>
            </thead>
            <tbody>";
    foreach ($inventario as $producto => $productoDatos) {
        echo "<tr>
                    <td>
                    <input type='hidden' name='icon$producto' value='{$productoDatos['icono']}'>{$productoDatos['icono']}</input></td>
                    <td>
                    <input type='hidden' name='$producto' value='$producto'>$producto</input>
                    </td>
                    <td>
                    <input type='number' name='{$producto}UdsPedidas' id='{$producto}UdsPedidas' min='0' max='{$productoDatos['unidades']}'/>
                    <input type='hidden' name='{$producto}UdsDisponibles'value='{$productoDatos['unidades']}'/>
                    </td>
                    <td>
                    <input type='hidden' class='precio' name='precio{$producto}' value='{$productoDatos['precio']}'/>{$productoDatos['precio']}
                        </td>
                    <td>
                    <label class='total'>0</label>
                    </td>";
    }
    echo "
                <tr>
                    <td colspan='5'>
                        <input type='submit' value='Comprar' />
                    </td>
                    <td>
                    </td>
                </tr>
    </form>
    </tbody>

    </table>

</body>

<style>
    body {
        padding: 2em;
    }

    input {
        text-align: center;
    }

    table,
    th,
    td {
        border-collapse: collapse;
        text-align: center;
    }
</style>
<script>
    // const inputs = document.querySelectorAll('input[type='number']');
    // const labels = document.querySelectorAll('label');
    // inputs.forEach(input => {
    //     input.addEventListener('change', () => {
    //         const precio = input.parentElement.nextElementSibling.textContent;
    //         let total = input.value * precio
    //         total = Math.ceil(total * 100) / 100;
    //         input.parentElement.nextElementSibling.nextElementSibling.textContent = total;

    //     });
    // });
</script>

</html> ";
}
