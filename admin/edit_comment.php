<?php

include("../includes/header-code.php");

$user= new User($db);
$result = $user->read_individual($id);

$dataBase = new Basemysql();
$db = $dataBase->connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$comment = new Comment($db);
$result = $comment->read_individual($id);

if (isset($_POST["editComment"])) {
    $idComment = $_POST["id"];
    $accept = $_POST["acceptComment"];

    if ($comment->update($idComment, $accept)) {
        $message = "Comment successfully updated.";
        header("Location:comments.php?message=" . urlencode($message));
        exit();
    } else {
        $error = "Error updating comment. Try again.";
    }
}

if (isset($_POST["deleteComment"])) {
    $idComment = $_POST["id"];

    if ($comment->delete($idComment)) {
        $message = "Comment successfully deleted.";
        header("Location:comments.php?message=" . urlencode($message));
        exit();
    } else {
        $error = "Error deleting comment. Try again.";
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

<div class="container mt-5 container-50">

    <div class="row">
        <div class="col-12 mb-3">
            <h2 class="ubuntu-r">Check the comment</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <form method="POST">

                <input type="hidden" name="id" value="<?php echo $result->id_comment; ?>">

                <div class="mb-3">
                    <label for="text">Comment:</label>
                    <textarea class="form-control" style="height: 200px;" readonly><?php echo $result->comment; ?>
                </textarea>
                </div>

                <div class="mb-3">
                    <span class="ubuntu-r">User:</span><?php echo " " . $result->user_nick; ?></span>
                </div>

                <div class="mb-1">
                    <select class="form-select" id="select" name="acceptComment" aria-label="Default select example">
                        <option value="">Approved?</option>
                        <option value="1">Approved</option>
                        <option value="0">Not Approved</option>
                    </select>
                </div><br />

                <button type="submit" name="editComment" class="btn bg-green-color w-100 mb-2">Update comment</button>

                <button type="submit" name="deleteComment" class="btn bg-red-color w-100">Delete comment</button>
            </form>

        </div>
    </div>
</div>

<?php include("../includes/footer_code.php") ?>
