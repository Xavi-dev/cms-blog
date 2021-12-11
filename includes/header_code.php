<?php

require "../config/config.php";      // Require all the models, connection(BaseMysql.php), config and helpers.
require "../config/BaseMysql.php";
require "../helpers/helpers.php";
require "../models/Post.php";
require "../models/Comment.php";
require "../models/User.php";
require "../models/Customise.php";
require "../models/Legals.php";


session_start();   // initialise session

   if (!$_SESSION['blog_user_log']) {  // if blog_user_log session is not active, redirect to acces.php
      header("Location: ../acces.php");
   }

   $dataBase = new Basemysql();  // Connect to database
   $db = $dataBase->connect();

   $customObj = new Customise($db);  // Instantiate the Customise class
   $resultCustom = $customObj->readCustomiseLogo();  // Call the readCustomiseLogo method of the Customise class

?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">    <!-- Bootstrap css link -->
         <link rel="stylesheet" href="css-blog/style-blog.css">    <!-- Styles css link -->
         <title>CRM BLOG</title>
   </head>

<body class="class-body">

    <!---------- NAV BAR ---------->
    
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">

      <?php foreach ($resultCustom as $i) : ?>
         <a href="<?php echo RUTA_FRONT; ?>index.php">
            <img src="../img/img_customise/<?php echo $i->logo; ?>" class="logo-nav" alt="">
         </a>
      <?php endforeach; ?>
            
         <ul class="navbar-nav mb-2 mb-lg-0">

            <li class="nav-item">
               <a class="nav-link" href="<?php echo RUTA_FRONT; ?>index.php">Home</a>
            </li>

         <?php if (isset($_SESSION['blog_user_log'])) : ?>   <!-- if blog_user_log session is started we show the log out link -->
            <li class="nav-item">
               <a class="nav-link" href="<?php echo RUTA_FRONT; ?>exit.php">Log out</a>
            </li>
         <?php endif; ?>

         </ul>

      </div>
   </div>
</nav>
