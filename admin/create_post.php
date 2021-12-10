<?php

include("../includes/header-code.php");

$dataBase = new Basemysql();
$db = $dataBase->connect();

if (isset($_POST['post_create'])) {
    $title = $_POST['title'];
    $text = $_POST['text'];
    if (empty($title) || empty($text)) {
        $error = "Error, there are empty fields.";
    } else {
        // Validem si des de l'input type="file" s'ha pujat la imatge o si hi ha un error
        if ($_FILES['image']["error"] > 0) {
            $error = "Error, no image uploaded.";
        } else {
            $image = $_FILES['image']['name']; # Agafem el nom de l'imatge
            $imageArr = explode('.', $image); # Separem en un array el nom abans i despres del punt "imatge.jpg"
            $rand = rand(1000, 99999); # Creem un número aleatori
            $newImageName = $imageArr[0] . $rand . '.' . $imageArr[1];
            // Atribuim un nou nom a l'imatge que seria per exemple-> imatge34522.jpg
            $finalRoute = "../img/img_posts/" . $newImageName; # Creem una nova ruta d'arxiu
            move_uploaded_file($_FILES['image']['tmp_name'], $finalRoute); # Movem l'arxiu a la nova ruta.

            $post = new Post($db);

            if ($post->create($title, $newImageName, $text)) {
                $message = "Post successfully created.";
                header("Location:posts.php?message=" . urlencode($message));
            } else {
                $error = "Error, article not created. Try again.";
            }
        }
    }
}

?>


<div class="row">
    <div class="col-sm-12">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger alert-dismissible fade show message" role="alert">
                <?php echo $error; ?>
                <button type="button" class="btn-close" id="x-alert" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="container mt-5 container-50">

    <div class="row">
        <div class="col-12 mb-2">
            <h2 class="ubuntu-r">Create a new post</h2>
        </div>
    </div>

    <div class="row table-responsive">
        <div class="col-12">

            <table class="table" style="width:100%">

                <form method="POST" enctype="multipart/form-data">

                    <div class="mb-2">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="mb-2">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" class="form-control" name="image" placeholder="Select an image">
                    </div>

                    <div class="mb-2">
                        <label for="text">Text:</label>
                        <textarea class="form-control" name="text" style="height: 200px;"></textarea>
                    </div>

                    <button type="submit" name="post_create" class="btn bg-green-color w-100">Create a post</button>

                </form>
            </table>

        </div>
    </div>
</div>

<?php include("../includes/footer_code.php") ?>
