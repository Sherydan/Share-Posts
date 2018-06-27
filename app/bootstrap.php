<?php
    # Cargar archivo de configuracion
    require_once('../app/config/config.php');

    # Cargar Helpers
    require_once('../app/helpers/url_helper.php');
    
    # Cargar automaticamente todas las librerias
    spl_autoload_register(function($className){
        require_once('libraries/'. $className . '.php');
    });
?>