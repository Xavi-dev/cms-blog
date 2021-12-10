<?php

require "config/config.php";      // Require all the models, connection(BaseMysql.php), config and helpers.
require "config/BaseMysql.php";
require "helpers/helpers.php";
require "models/Post.php";
require "models/Comment.php";
require "models/User.php";
require "models/Customise.php";
require "models/Legals.php";

   $dataBase = new Basemysql(); // Connect to database
   $db = $dataBase->connect();

   $customObj = new Customise($db); // Instantiate Customise class
   $resultCustom = $customObj->readCustomiseLogo(); // Call the readCustomiseLogo method of the Customise class

   session_start(); // Initialise session

?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">   <!-- bootstrap css link -->
         <link rel="stylesheet" href="css-blog/style-blog.css">   <!-- styles css link -->
         <title>CRM BLOG</title>
   </head>

<body class="class-body">

<!----------- Nav Bar ---------->

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">

      <?php foreach ($resultCustom as $i) : ?>
         <a href="<?php echo RUTA_FRONT; ?>index.php"><img src="img/img_customise/<?php echo $i->logo; ?>" class="logo-nav" alt=""></a>
      <?php endforeach; ?>

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

         <?php if (isset($_SESSION['blog_user_log'])) : ?>   <!-- If the session is already initialised, we show the administration navigation bar. -->

            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <li>
                        <a class="dropdown-item" href="<?php echo RUTA_ADMIN; ?>posts.php">Posts</a>
                     </li>
                     <li>
                        <a class="dropdown-item" href="<?php echo RUTA_ADMIN; ?>comments.php">Comments</a>
                     </li>
                     <li>
                        <a class="dropdown-item" href="<?php echo RUTA_ADMIN; ?>create_customise.php">Customise</a>
                     </li>
                     <li>
                        <a class="dropdown-item" href="<?php echo RUTA_ADMIN; ?>create_cookies_page.php">Cookies</a>
                     </li>
                     <li>
                        <a class="dropdown-item" href="<?php echo RUTA_ADMIN; ?>create_privacy_page.php">Privacy</a>
                     </li>
                  </ul>
           </li>
              <li class="nav-item">
                 <a class="nav-link" href="<?php echo RUTA_ADMIN; ?>users.php">Users</a>
              </li>
              </ul>

        <?php endif; ?>

   <ul class="navbar-nav mb-2 mb-lg-0">

   <?php if (!isset($_SESSION['blog_user_log'])) : ?>   <!-- If the session is not initialised, we show the public navigation bar. -->
          
      <li class="nav-item">
         <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="registration.php">Registration</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="acces.php">Acces</a>
      </li>
   <?php endif; ?>

   <?php if (isset($_SESSION['blog_user_log'])) : ?>

       <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTA_FRONT; ?>exit.php">Log out</a>   <!-- If the session is already initialised, we show the log out link. -->
       </li>
    </ul>

    <?php endif; ?>

      </div>
   </div>
</nav>
