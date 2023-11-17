<?php

    class AutoloadClass {
        
        public static function autoload($className) {
            include $className . ".php";
        }
    }

?>