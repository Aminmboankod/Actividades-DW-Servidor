<?php

    $numero = rand(1, 100);
    $intentos = 10;
    $adivina = 0;
    $mensaje = "";

    if (isset($_POST["adivina"]) && isset($_POST["intentos"])) {
        $adivina = (int) filter_input(INPUT_POST, "adivina", FILTER_VALIDATE_INT);
        $intentos = (int) $_POST["intentos"] - 1;
        $numero = (int) $_POST["numero"];

        if ($numero == $adivina) {
            $mensaje = "¡Has acertado!";
        } elseif ($intentos == 0) {
            $mensaje = "¡Has perdido!";
        } elseif ($numero < $adivina) {
            $mensaje = "Demasiado bajo - ¡Prueba otra vez!";
        } else {
            $mensaje = "Demasiado alto - ¡Prueba otra vez!";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina el número</title>
</head>
<body>
    <h1>Adivina el número</h1>

    <form method="POST">
        <label>
            Introduce un número entre 1 y 100:
            <input type="hidden" name="adivina" value="<?php echo $adivina ?>">
        </label>
        <label>
            <p>¡Tienes <?php echo $intentos ?> 
            <?php echo ( $intentos == 1 ) ? "intento" : "intentos" ?> para adivinarlo!</p>
            <input type="hidden" name="intentos" value="<?php echo $intentos ?>">
        </label>
        <label>
            <?php
                if ($mensaje) {
                    echo "<p>$mensaje</p>";
                } else {
                    echo "<p></p>";
                }
            ?>
            <input type="number" name="numero" value="<?php echo $numero ?>">
        </label>
        <input type="submit" name='submit' value="Adivinar"/>
    </form>
</body>
</html>