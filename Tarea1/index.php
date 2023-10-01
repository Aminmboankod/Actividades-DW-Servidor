<!DOCTYPE html>
<html lang="es">
<head>
    <title>Tabla de Variables</title>
    <!-- añado enlace a fichero de css externo -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1 style="text-align: center">Tabla de estado de variables (PHP)</h1>
    <table >
        <tr>
            <th>Valor de "var"</th>
            <th>isset($var)</th>
            <th>empty($var)</th>
            <th>(bool)$var</th>
        </tr>
        <?php 
            // creo la variable $var a la que hacerle las conversiones y comprobaciones

            $var = null;
            /* creo una columna con el valor de var en null 
            *  y creo otra 3 columnas para aplicarle isset($var), empty($var) y (bool)$var
            */

            // a cotinuación voy a utilizar el var_export() para mostrar el valor real de la variable
            // utilizo los . para concatenar el codigo con las etiquetas html
            echo "<tr>
                    <td>" . var_export($var, true) . "</td>
                    <td>" . var_export(isset($var), true) . "</td>
                    <td>" . var_export(empty($var), true) . "</td>
                    <td>" . var_export((bool)$var, true) . "</td>
                </tr>";

            $var = 0;
            echo "<tr>
                    <td>" . var_export($var, true) . "</td>
                    <td>" . var_export(isset($var), true) . "</td>
                    <td>" . var_export(empty($var), true) . "</td>
                    <td>" . var_export((bool)$var, true) . "</td>
                </tr>";

            $var = true;
            echo "<tr>
                    <td>" . var_export($var, true) . "</td>
                    <td>" . var_export(isset($var), true) . "</td>
                    <td>" . var_export(empty($var), true) . "</td>
                    <td>" . var_export((bool)$var, true) . "</td>
                </tr>";

            $var = false;
            echo "<tr>
                    <td>" . var_export($var, true) . "</td>
                    <td>" . var_export(isset($var), true) . "</td>
                    <td>" . var_export(empty($var), true) . "</td>
                    <td>" . var_export((bool)$var, true) . "</td>
                </tr>";

            $var = "0";
            echo "<tr>
                    <td>" . var_export($var, true) . "</td>
                    <td>" . var_export(isset($var), true) . "</td>
                    <td>" . var_export(empty($var), true) . "</td>
                    <td>" . var_export((bool)$var, true) . "</td>
                </tr>";

            $var = "";
            echo "<tr>
                    <td>" . var_export($var, true) . "</td>
                    <td>" . var_export(isset($var), true) . "</td>
                    <td>" . var_export(empty($var), true) . "</td>
                    <td>" . var_export((bool)$var, true) . "</td>
                </tr>";

            $var = "foo";
            echo "<tr>
                    <td>" . var_export($var, true) . "</td>
                    <td>" . var_export(isset($var), true) . "</td>
                    <td>" . var_export(empty($var), true) . "</td>
                    <td>" . var_export((bool)$var, true) . "</td>
                </tr>";

            $var = array();
            echo "<tr>
                    <td>" . var_export($var, true) . "</td>
                    <td>" . var_export(isset($var), true) . "</td>
                    <td>" . var_export(empty($var), true) . "</td>
                    <td>" . var_export((bool)$var, true) . "</td>
                </tr>";

            unset($var);
            echo "<tr>
                    <td>" . "unset(\$var)" . "</td>
                    <td>" . var_export(isset($var), true) . "</td>
                    <td>" . var_export(empty($var), true) . "</td>
                    <td>" . var_export((bool)$var, true) . "</td>
                </tr>";
        ?>
    </table>

    <!-- a continuación añado una breve leyenda para epxlicar que hace isset() empty() y (bool) -->
    <div class="card">
        <h2>Explicación de las funciones</h2>
        <p>
            <strong>isset()</strong> devuelve true si la variable existe y tiene un valor distinto de null.
        </p>
        <p>
            <strong>empty()</strong> devuelve true si la variable existe y tiene un valor distinto de null, 0, false, "" o array().
        </p>
        <p>
            <strong>(bool)</strong> devuelve true si la variable existe y tiene un valor distinto de null, 0, false, "" o array().
        </p>
    </div>
</body>
</html>
