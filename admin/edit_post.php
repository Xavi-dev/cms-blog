<?php

include("../includes/header-code.php");

$dataBase = new Basemysql();
$db = $dataBase->connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$posts = new Post($db);
$result = $posts->read_individual($id);

if (isset($_POST['editPost'])) {
    $idPost = $_POST["id"];
    $title = $_POST["title"];
    $text = $_POST["text"];

    if ($_FILES["image"]["error"] > 0) {
        if (empty($title) || empty($text)) {
            $error = "Error, there are empty fields.";
        } else {
            $post = new Post($db);
            $newImageName = "";

            if ($post->update($idPost, $title, $text, $newImageName)) {
                $message = "Post successfully edited.";
                header("Location:posts.php?message=" . urlencode($message));
                exit();
            } else {
                $error = "Error editing post. Try again.";
            }
        }
    } else {
        //Si no, si s'ha pujat l'imatge...
        if (empty($title) || $title == '' || empty($text) || $text == '') {
            $error = "Error, there are empty fields.";
        } else {
            $image = $_FILES['image']['name'];
            $imageArr = explode('.', $image);
            $rand = rand(1000, 99999);
            $newImageName = $imageArr[0] . $rand . '.' . $imageArr[1];
            $finalRoute = "../img/img_posts/" . $newImageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $finalRoute);

            $post = new Post($db);

            if ($post->update($idPost, $title, $text, $newImageName)) {
                $message = "Post successfully edited.";
                header("Location:posts.php?message=" . urlencode($message));
            } else {
                $error = "Error editing post. Try again.";
            }
        }
    }
}

if (isset($_POST['deletePost'])) {
    $idPost = $_POST['id'];

    $post = new Post($db);

    if ($post->delete($idPost)) {
        $message = "Post successfully deleted.";
        header("Location:posts.php?message=" . urlencode($message));
    } else {
        $error = "Error deleting post. Try again.";
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
            <h2 class="ubuntu-r">Edit post</h2>
        </div>
    </div>

    <div class="row table-responsive">
        <div class="col-12">

            <table class="table" style="width:100%">

                <form method="POST" action="" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $result->id; ?>">

                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $result->title; ?>">
                    </div>

                    <div class="mb-3">
                        <img class="img-fluid mx-auto w-100" src="../img/img_posts/<?php echo $result->image;?>">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" class="form-control" name="image" placeholder="Select an image">
                    </div>
                    <div class="mb-3">
                        <label for="text">Text:</label>
                        <textarea class="form-control" placeholder="Write the post text" name="text" style="height: 200px">
                <?php echo $result->text; ?>
                </textarea>
                    </div>
                    <button type="submit" name="editPost" class="btn bg-green-color w-100 mb-2">Edit</button>
                    <button type="submit" name="deletePost" class="btn bg-red-color w-100">Delete</button>
                </form>

            </table>

        </div>
    </div>
</div>

<?php include("../includes/footer_code.php") ?>
