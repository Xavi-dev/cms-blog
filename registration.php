<?php

include("includes/header_front.php");

   $dataBase = new Basemysql(); // Connect to database
   $db = $dataBase->connect();  
   $user = new User($db); // Instantiate the user class

   if (isset($_POST['register'])) {
      $name = $_POST['name'];
      $nick = $_POST['nick'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirm_password'];

   if (empty($name) || empty($nick) || empty($email) || empty($password) || empty($confirmPassword)) {
      $error = "Error, there are empty fields.";
   }else{
      if ($password != $confirmPassword) {
         $error = "Error, the passwords are not equal!";
      }else{
         if ($user->validate_email($email)) {                             // Validate if the email already exists in the database
            if ($user->register($name, $nick, $email, $password)) {
               $message = "You have successfully registered";
            }else{
               $error = "Error, user record has not been created, try again.";
               }
            }else{
               $error = "Error, this email already exists in the database!";
            }
        }
    }
}

?>


<div class="row">
    <div class="col-sm-12">
        <?php if (isset($error)) : ?>
            <div class="alert alert-dismissible fade show message bg-red-color" role="alert">
                <?php echo $error; ?>
                <button type="button" class="btn-close" id="x-alert" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <?php if (isset($message)) : ?>
            <div class="alert alert-dismissible fade show message bg-green-color" role="alert">
                <?php echo $message; ?>
                <button type="button" class="btn-close" id="x-alert" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>


   <div class="container mt-5 container-25 container-50">

      <form method="POST" id="userform" class="form pt-4">

         <div class="mb-1">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" required>
         </div>

         <div class="mb-1">
            <label for="nick" class="form-label">User name:</label>
            <input type="text" class="form-control" name="nick" required>
         </div>

         <div class="mb-1">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" required>
         </div>

         <div class="mb-1">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" name="password" required>
         </div>

         <div class="mb-1">
            <label for="confirm_password" class="form-label">Repeat password:</label>
            <input type="password" class="form-control" name="confirm_password" required>
         </div>
         
         <button type="submit" name="register" class="btn bg-green-color d-block w-100 mt-3 ubuntu-r">Register</button>

      </form>

   </div>

<?php include("includes/footer_code.php") ?>
