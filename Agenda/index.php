<?php
    // Función para obtener la agenda
    function obtenerAgenda() {
        if (isset($_POST['agenda'])) {
            return $_POST['agenda'];
        } else {
            return array();
        }
    }

    // Función para procesar el formulario
    function procesarFormulario($agenda) {
        if (isset($_POST['submit'])) {
            $nuevo_nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $nuevo_telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);
            $foto = filter_input(INPUT_POST, 'foto', FILTER_SANITIZE_STRING);
            if (empty($nuevo_nombre)) {
                // si el nombre está vacío
                echo "<p style='color:red'>Debe introducir un nombre.</p><br />";
            } elseif (empty($nuevo_telefono)) {
                // si el teléfono está vacío
                unset($agenda[$nuevo_nombre]);
            } else {
                // si el nombre y el teléfono no están vacíos
                $agenda[$nuevo_nombre] = $nuevo_telefono;
                $agenda[$foto] += $foto;
            }
        }

        return $agenda;
    }

    // Función para mostrar la agenda
    function mostrarAgenda($agenda) {
        if (empty($agenda)) {
            echo "<p>No hay contactos en la agenda.</p>";
        } else {
            echo "<ul>";
            foreach ($agenda as $nombre => $telefono) {
                echo "<li><img src='. $agenda[$foto] .' width='50px' alt='foto' >{$nombre}: {$telefono}</li>";
            }
            echo "</ul>";
        }
    }

    $agenda = obtenerAgenda();
    $agenda = procesarFormulario($agenda);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h2>Nuevo contacto</h2>
    <form method="POST" >
        <div style="align-items: center">
            <?php
            foreach ($agenda as $nombre => $telefono) {
                echo '<input type="hidden" name="agenda[' . $nombre . ']" value="' . $telefono . '"/>';
            }
            ?>
            <label>Nombre:
                <input type="text" name="nombre"/>
            </label>
            <br />
            <label>Teléfono:
                <input type="number" name="telefono"/>
            </label>
            <br />
            <label>Foto:
                <input type="file" name="foto"/>
            </label>
            <br />
            <input type="submit" name='submit' value="Ejecutar"/>
            <br />
        </div>
    </form>
    <br />
    <h2>Agenda</h2>
    <div>
        <?php mostrarAgenda($agenda); ?>
    </div>
</body>
</html>