<?php

    // Para crear una cookie:
    setcookie("fontSize", "20px", time() + 60 * 60 * 24 * 365, "/", "localhost", false, true);

    // Para leer una cookie
    // IMPORTANTE: Si está recien creada no será disponible vía $_COOKIE
    echo $_COOKIE["fontSize"];

    // Para eliminar una cookie:
    setcookie("fontSize", "", time() - 3600, "/", "localhost", false, true);
?>
