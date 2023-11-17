<?php


    require "AutoloadClass.php";


    function auto_register($className) {
        try {
            include "clases/$className.php";
        } catch (Exception $e) {
            echo "Error al cargar la clase: " . $e->getMessage();
        }
    }

    function auto_register2($className) {
        try {
        
            $mis_clases = array(
                'Persona' => 'clases/Persona.php',
                'Casa' => 'clases/Casa.php'
            );
            if (isset($mis_clases[$className])) {
                include $mis_clases[$className];
            }

        } catch (Exception $e) {
            echo "Error al cargar la clase: " . $e->getMessage();
        }
    }

    spl_autoload_register('auto_register');
    spl_autoload_register('AutoloadClass::autoload');
    spl_autoload_register(function($className) {
        try {
            echo "Cargando la clase $className desde función anónima\n";
            include "clases/$className.php";
        } catch (Exception $e) {
            echo "Error al cargar la clase: " . $e->getMessage();
        }
    });
    spl_autoload_register('auto_register'|'auto_register2');

    $persona = new Persona();
    $persona->saludar();

    $casa = new Casa();
    $casa->mostrar();

?>
