<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS
     <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
    -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/bootstrap_material.min.css">

    
   
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
    <title><?php echo SITENAME; ?></title>
</head>

    <?php require_once(APPROOT. '/views/inc/navbar.php'); ?>

    <?php 
        $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    ?>

    <?php if ($url == 'http://localhost/shareposts/pages/contact') {
        echo "<div id=\"background_contact\">";
    } else {
        echo "<div class=\"container\">";
    } 
    ?>
    
    
    <!-- Main container start -->
    
    
    

<body>