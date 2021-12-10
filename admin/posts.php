<?php

include("../includes/header-code.php");

$dataBase = new Basemysql();   // Connect to database
$db = $dataBase->connect();

$posts = new Post($db);   // Instantiate the Post class
$result = $posts->read();  // Call the read metho of the Post class

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
        <div class="col-sm-6 mt-3">
            <h3>Posts list</h3>
        </div>

        <div class="col-sm-12">
            <a href="create_post.php" class="btn bg-green-color w-100 ubuntu-r">New post</a>
        </div>
    </div>

    <div class="row mt-2 table-responsive">
        <div class="col-sm-12">

            <table class="table w-100">

                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Text</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>



                <?php foreach ($result as $post) : ?>
                    <tr>
                        <td><?php echo $post->title; ?></td>
                        <td>
                            <img class="img-fluid" src="../img/img_posts/<?php echo $post->image;?>" style="width:180px;">
                        </td>
                        <td><?php echo substr($post->text, 0, 250) . "..."; ?></td>  <!-- Cut the text to 250 characters -->
                        <td><?php echo $post->created_date; ?></td>
                        <td>
                            <a href="edit_post.php?id=<?php echo $post->id; ?>" class="btn bg-yellow-color ubuntu-r">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>

        </div>
    </div>
</div>

<?php include("../includes/footer_code.php") ?>
