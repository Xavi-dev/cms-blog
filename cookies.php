<?php

include("includes/header_front.php");

   $dataBase = new Basemysql();
   $db = $dataBase->connect();

   $cookiesPage = new Legals($db);
   $result = $cookiesPage->readCookiesPage();

?>

<div class="container">

   <div class="row mt-5">
      <div class="col-12">

      <?php foreach ($result as $i) : ?>
         <p><?php echo $i->cookies_text; ?></p>
      <?php endforeach; ?>

      </div>
   </div>

<?php include("includes/footer.php") ?>
