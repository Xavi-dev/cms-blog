<?php

include("includes/header_front.php");

   $dataBase = new Basemysql(); // Connect to database
   $db = $dataBase->connect();

   $posts = new Post($db); // Instantiate the Post class
   $result = $posts->read(); // Call to read method of the Post class

   $customObj = new Customise($db); // Instantiate the Customise class
   $resultCustom = $customObj->readCustomiseHeaderImage(); // Call to readCustomiseHeaderImage method of the Post class


?>

<div class="container-fluid p-0">

   <?php foreach ($resultCustom as $i) : ?>
  
      <img src="<?php echo RUTA_FRONT; ?>img/img_customise/<?php echo $i->header_image; ?>" class="header-image w-100 mb-5" alt="">

   <?php endforeach; ?>

</div>

<div class="container mt-5">

   <?php foreach($result as $post) : ?>
        
   <div class="row mb-4">
         <div class="col-md-4">
            <img src="<?php echo RUTA_FRONT; ?>img/img_posts/<?php echo $post->image; ?>" class="card-img-top">
         </div>
      <div class="col-md-8 border-1 div-post-text">
         <h2><a style="color: #44868F;" href="detail.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h2>
         <small class="post-date">Creation date: <?php echo dateFormat($post->created_date); ?></small> <!-- Call to dateFormat function (helpers/helpers.php)-->
         <div class="post-text">
            <?php echo substr($post->text, 0, 260) . "..."; ?>
            <a style="color: #44868F;" href="detail.php?id=<?php echo $post->id; ?>"><strong>read more.</strong></a>
         </div>
                        
      </div>
          
   </div>

<?php endforeach; ?>
            
</div>

<?php include("includes/footer.php") ?>
