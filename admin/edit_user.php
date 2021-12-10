<?php

include("../includes/header-code.php");

$dataBase = new Basemysql();  // Connect to database
$db = $dataBase->connect();

if (isset($_GET['id'])) {  // Get the id
    $id = $_GET['id'];
}

$user = new User($db);  // Instantiate the User class
$result = $user->read_individual($id);  // Call the read_individual method of the User class

if (isset($_POST["editUser"])) {
    $idUser = $_GET["id"]; 
    $role = $_POST["role"];

    if (empty($idUser) || empty($role)) {
        $error = "Error, there are empty fields.";
    } else {
        if ($user->update($idUser, $role)) {
            $message = "User successfully edited.";
            header("Location:users.php?message=" . urlencode($message));
            exit();
        } else {
            $error = "Error editing user. Try again.";
        }
    }
}

if (isset($_POST["deleteUser"])) {
    $idUser = $_GET["id"]; 

    if (empty($idUser)) {
        $error = "Error, there are empty fields.";
    } else {
        if ($user->delete($idUser)) {
            $message = "User successfully deleted.";
            header("Location:users.php?message=" . urlencode($message));
            exit();
        } else {
            $error = "Error deleting user. Try again";
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


<div class="container mt-5 container-50">

    <div class="row">
        <div class="col-12 mb-3">
            <h2><strong>Edit User role</strong></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="row table-responsive">
                <div class="col-12">

                    <table class="table" style="width:100%">

                        <form method="POST">
                            <input type="hidden" value="<?php echo $result->user_id; ?>">

                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $result->user_name; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $result->user_email; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role:</label>
                                <select class="form-select" aria-label="Default select example" name="role">
                                    <option value="">-- Select a role --</option>
                                    <option value="1" <?php if ($result->role == "Administrator") {
                                                            echo "selected";
                                                        } ?>>Administrator</option>
                                    <option value="2" <?php if ($result->role == "Registered") {
                                                            echo "selected";
                                                        } ?>>Registered</option>
                                </select>
                            </div>

                            <button type="submit" name="editUser" class="btn bg-green-color w-100 mb-2">Edit</button>
                            <button type="submit" name="deleteUser" class="btn bg-red-color w-100">Delete</button>
                        </form>

                    </table>

                </div>
            </div>
        </div>


        <?php include("../includes/footer_code.php") ?>
