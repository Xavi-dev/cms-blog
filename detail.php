<?php

include("includes/header_front.php");

   $dataBase = new Basemysql();
   $db = $dataBase->connect();

   if (isset($_GET["id"])) {
      $idPost = $_GET["id"];
   }

   $post = new Post($db);
   $result = $post->read_individual($idPost);

   $commentObj = new Comment($db);
   $result2 = $commentObj->readById($idPost);

   if (isset($_POST['send_comment'])) {
      $idPost = $_POST['post'];
      $nick = $_POST['nick'];
      $comment = $_POST['comment'];

      if (empty($nick) || empty($comment)) {
         $error = "Error, there are empty fields.";
      }else{
         $commentObj->create($nick, $comment, $idPost);
         $message = "Comment created correctly, will be edited once it has been reviewed.";
      }
   }

?>

<div class="row">
    <div class="col-sm-12">
        <?php if (isset($error)) : ?>
            <div class="alert bg-red-color alert-dismissible fade show message" role="alert">
                <?php echo $error; ?>
                <button type="button" class="btn-close" id="x-alert" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <?php if (isset($message)) : ?>
            <div class="alert bg-green-color alert-dismissible fade show message" role="alert">
                <?php echo $message; ?>
                <button type="button" class="btn-close" id="x-alert" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>


<div class="container-fluid p-0 mb-5">
   <img class="header-image w-100" src="img/img_posts/<?php echo $result->image; ?>">
</div>

<div class="container-lg container-fluid">

   <div class="row mt-3">
      <div class="col-12">
         <h1 class="color-green"><?php echo $result->title; ?></h1>
      </div>
   </div>

   <div class="row mt-3">
      <div class="col-12 post-text">
         <?php echo $result->text; ?>
      </div>
   </div>

<?php if (isset($_SESSION['blog_user_log'])) : ?>
   
   <div class="row mt-5">
      <div class="col-12 div-comment mx-auto">

      <form method="POST">

         <input type="hidden" name="post" value="<?php echo $idPost; ?>">
            <input type="hidden" name="nick" id="nick" value="<?php echo $_SESSION['nick']; ?>" readonly>

             <div class="mb-3">
                <label for="comment" class="form-label text-085rem">Comment:</label>
                <textarea class="form-control text-085rem" name="comment" style="height: 200px"></textarea>
             </div>

             <button type="submit" name="send_comment" class="btn bg-green-color btn-green w-100">Send comment</button>
      </form>
            
      </div>
   </div>

</div>

<?php endif; ?>

   <div class="container mt-5">
      <h3 class="mb-3">Comments:</h3>

<?php foreach ($result2 as $comment) : ?>

      <p class="ubunut-r">User: <?php echo $comment->user_nick; ?></p>
      <p class="text-085rem"><?php echo $comment->comment; ?></p>

<?php endforeach; ?>

   </div>

</div>

<?php include("includes/footer.php") ?>
