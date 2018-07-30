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
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/r-2.2.2/datatables.min.css"/>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/r-2.2.2/datatables.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>



    <title><?php echo SITENAME; ?></title>
</head>

    <?php require_once(APPROOT. '/views/inc/navbar.php'); ?>

    <?php 
        $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
    ?>
    
    <?php 
    
    if ($url == ''.URLROOT.'/pages/contact') {
        echo "<div id=\"background_contact\">";
    } else {
        echo "<div class=\"container\">";
    } 

    
    ?>
    
    <div class="container">
    
    
    <!-- Main container start -->
    
    
    

<body>