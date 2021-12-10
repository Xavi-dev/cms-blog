<?php

include("../includes/header-code.php");

$dataBase = new Basemysql();
$db = $dataBase->connect();

$commentObj = new Comment($db);
$resultComment = $commentObj->read();

$UserObj = new User($db);
$resultUser = $UserObj->read();

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
        <div class="col-12 mt-3">
            <h3 class="ubuntu-r">Comments</h3>
        </div>
    </div>

    <div class="row table-responsive">
        <div class="col-12">

            <table class="table">

                <tr>
                    <th>Comment</th>
                    <th class="table-bg-grey">User</th>
                    <th>Article</th>
                    <th class="table-bg-grey">Approved?</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>

                <?php foreach ($resultComment as $comment) : ?>
                    <tr>
                        <td><?php echo $comment->comment; ?></td>
                        <td class="table-bg-grey"><?php echo $comment->nick; ?></td>
                        <td><?php echo $comment->post_title; ?></td>
                        <td class="table-bg-grey"><?php if ($comment->role == 0) {
                                echo "No approved";
                            } else {
                                echo "Approved";
                            }; ?></td>
                        <td><?php echo dateFormat($comment->created_date); ?></td>
                        <td>
                            <a href="edit_comment.php?id=<?php echo $comment->id_comment; ?>" class="btn bg-yellow-color ubuntu-r">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                

            </table>

        </div>
    </div>
</div>

<?php include("../includes/footer_code.php") ?>
