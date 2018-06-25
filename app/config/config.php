<?php
    # Parametros de la db

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('DB_NAME', 'shareposts');

    # URL de la APP
    # La uso para hacer los require de footer y head dentro de las vistas
    # La uso para llamar elementos que se encuentran dentro de la carpeta "app"
    define('APPROOT', dirname(dirname(__FILE__)));

    # URL de la pagina
    # ojo con poner o no el slash al final de la URL
    # La uso para llamar elementos que estan dentro de la carpeta "public"
    define('URLROOT', 'http://localhost/shareposts');

    # Nombre del sitio
    define('SITENAME', 'SharePosts');

    # Version
    define('APPVERSION', '1.0.0');


    
?>