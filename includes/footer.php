<?php

$dataBase = new Basemysql();  // Connect to database.
$db = $dataBase->connect(); 

$customSocialIcon1 = new Customise($db);  // Instantiate Customise.
$resultSocialIcon1 = $customSocialIcon1->readSocialIcon1(); // Call the method to read database.

$customSocialIcon2 = new Customise($db);
$resultSocialIcon2 = $customSocialIcon2->readSocialIcon2();

$customSocialIcon3 = new Customise($db);
$resultSocialIcon3 = $customSocialIcon3->readSocialIcon3();

$customSocialIcon4 = new Customise($db);
$resultSocialIcon4 = $customSocialIcon4->readSocialIcon4();

$customSocialIcon5 = new Customise($db);
$resultSocialIcon5 = $customSocialIcon5->readSocialIcon5();

$customObj = new Customise($db);
$resultCustom = $customObj->readFooterText();

$cookies = new Legals($db);
$resultCookies = $cookies->readCookiesPage();

$privacy = new Legals($db);
$resultPrivacy = $privacy->readPrivacyPage();

?>

</div>

<footer class="text-muted mt-5">
   <div class="container-footer py-1 text-center pt-3">

   <?php foreach ($resultSocialIcon1 as $icon) : ?>

     <a href="https://<?php echo $icon->link_social_icon1; ?>">
        <img src="img/img_customise/<?php echo $icon->social_icon1; ?>" alt="" class="icon-social-footer">
     </a>

   <?php endforeach; ?>

   <?php foreach ($resultSocialIcon2 as $icon) : ?>

     <a href="https://<?php echo $icon->link_social_icon2; ?>">
        <img src="img/img_customise/<?php echo $icon->social_icon2; ?>" alt="" class="icon-social-footer">
     </a>

   <?php endforeach; ?>

   <?php foreach ($resultSocialIcon3 as $icon) : ?>

     <a href="https://<?php echo $icon->link_social_icon3; ?>">
        <img src="img/img_customise/<?php echo $icon->social_icon3; ?>" alt="" class="icon-social-footer">
     </a>

   <?php endforeach; ?>

   <?php foreach ($resultSocialIcon4 as $icon) : ?>

     <a href="https://<?php echo $icon->link_social_icon4; ?>">
        <img src="img/img_customise/<?php echo $icon->social_icon4; ?>" alt="" class="icon-social-footer">
     </a>

   <?php endforeach; ?>

   <?php foreach ($resultSocialIcon5 as $icon) : ?>

     <a href="https://<?php echo $icon->link_social_icon5; ?>">
        <img src="img/img_customise/<?php echo $icon->social_icon5; ?>" alt="" class="icon-social-footer">
     </a>

   <?php endforeach; ?>
    
   <div class="mb-2">

     <?php foreach ($resultCookies as $link) : ?>
        <small><a class="color-footer-link" href="<?php echo RUTA_FRONT; ?><?php echo "cookies.php"; ?>"><?php echo $link->cookies_text_link; ?></a></small>
     <?php endforeach; ?>

     <?php foreach ($resultPrivacy as $link) : ?>
        <small> | <a class="color-footer-link" href="<?php echo RUTA_FRONT; ?><?php echo "privacy.php"; ?>"><?php echo $link->privacy_text_link; ?></a></small>
     <?php endforeach; ?>

   </div>

   <div class="mb-2">

     <?php foreach ($resultCustom as $text) : ?>
        <small><?php echo $text->footer_text; ?></small>
     <?php endforeach; ?>
   </div>

  </div>
</footer>

           
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

<script>
     CKEDITOR.replace('text');
</script>

</body>
</html>
