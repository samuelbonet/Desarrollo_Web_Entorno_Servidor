<?php
require "./helpers.php";

if ($_GET) {
    $table = $_GET['table'];
    unset($_GET['table']);
    $formData = $_GET;
    $db = new Database();
    $entry = $db->get_entry($table, $formData);

    $html = "<form action='editar.php' method='post'>" . "<input type='hidden' name='table' value='$table'>";
    foreach ($entry as $key => $value) {
        foreach ($value as $key2 => $value2) {
            if (array_key_exists($key2, $formData)) {
                $html .= "<input type='text' name='$key2' value='$value2' readonly>";
            } else {
                $html .= "<input type='text' name='$key2' value='$value2'>";
            }
        }
    }
    $html .= "<button type='submit'>Editar</button>";
    $html .= "</form>";
} elseif ($_POST) {
    $table = $_POST['table'];
    unset($_POST['table']);
    $formData = $_POST;
    $db = new Database();
    $query = $db->update_entry($table, $formData);
    if ($query) {
        header("Location: ./index.php");
        die();
    } else {
        echo "Error al editar";
    }

} else {
    header("Location: ./index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - </title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>
    <link rel="stylesheet" href="assets/style.css">

</head>
<body>
<?= $html ?>

</body>
</html>