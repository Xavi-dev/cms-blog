<?php

include("includes/header_front.php");

   $dataBase = new Basemysql(); // Connect to database
   $db = $dataBase->connect();

   $user = new User($db); // Instantiate the User class

   if(isset($_POST['acces'])){
      $nick = $_POST['nick'];
      $password = $_POST['password'];

   if(empty($nick) || empty($password)){
      $error = "Error, there are empty fields.";
      }else{
         if($user->acces($nick, $password)){
            $_SESSION['blog_user_log'] = true; // Create a session blog_user_log
            $_SESSION['nick'] = $nick; // Get the nick 
            $message = "You are logged in.";
         }else{
            $error = "Error, the email or password is not correct!";
        }
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


<div class="container mt-5 container-25 container-acces-50">

   <form method="POST" id="userform" class="form pt-5">

      <div class="input-group mb-3">
         <input type="text" class="form-control" name="nick" placeholder="User name">
      </div>

      <div class="input-group mb-3">
         <input type="password" class="form-control" name="password" placeholder="Password">
      </div>

      <div class="row">
         <div class="col-sm-12 mb-1">
            <button type="submit" name="acces" class="btn bg-green-color d-block w-100 ubuntu-r">Acces</button>
         </div>
      </div>

   </form>

</div>

</div>

<?php include("includes/footer_code.php") ?>
