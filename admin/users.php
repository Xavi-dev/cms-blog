<?php

include("../includes/header-code.php");

$dataBase = new Basemysql();  // Connect to database
$db = $dataBase->connect();

$users = new User($db);  // Instantiate User class
$result = $users->read();  // Call read method of the User class

?>

<div class="row">
    <div class="col-sm-12">
        <?php if (isset($_GET['message'])) : ?>
            <div class="alert bg-green-color alert-dismissible fade show message" role="alert">
                <?php echo $_GET['message']; ?>
                <button type="button" class="btn-close" id="x-alert" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="container mt-5">

    <div class="row">
        <div class="col-12 mb-3 mt-3">
            <h2><strong>Users</strong></h2>
        </div>
    </div>

    <div class="row table-responsive">
        <div class="col-12">

            <table class="table" style="width:100%">

                <tr>
                    <th>Name</th>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Registered</th>
                    <th>Actions</th>
                </tr>

                <?php foreach ($result as $user) : ?>
                    <tr>
                        <td><?php echo $user->user_name; ?></td>
                        <td><?php echo $user->user_nick; ?></td>
                        <td><?php echo $user->user_email; ?></td>
                        <td><?php echo $user->role; ?></td>
                        <td><?php echo dateFormat($user->user_created_date); ?></td>
                        <td>
                            <a href="edit_user.php?id=<?php echo $user->user_id; ?>" class="btn bg-yellow-color">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>

        </div>
    </div>
</div>

<?php include("../includes/footer_code.php") ?>

