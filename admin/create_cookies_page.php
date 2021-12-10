<?php

include("../includes/header-code.php");

$dataBase = new Basemysql();
$db = $dataBase->connect();


if (isset($_POST['customise_cookies_page'])) {
    $cookies_text = $_POST['text'];
    $cookies_text_link = $_POST['cookies_text_link'];
    $customCookiesText = new Legals($db);
    $customCookiesText->createCookiesPage($cookies_text, $cookies_text_link);
    $message = "Cookies page successfully created.";
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


<div class="container mt-5 container-50">

    <div class="row">
        <div class="col-12 mb-2">
            <h2 class="ubuntu-r">Create your cookies page</h2>
        </div>
    </div>

    <div class="row table-responsive">
        <div class="col-12">

            <table class="table" style="width:100%">


                <form method="POST">

                    <div class="mb-2">
                        <label for="cookies_text"><strong>Text:</strong></label>
                        <textarea class="form-control" name="text" style="height: 200px;" required></textarea>
                    </div>
                    
                    <div class="mb-2">
                        <label for="cookies_text_link"><strong>Cookies page link:</strong></label>
                        <input type="text" class="form-control" name="cookies_text_link" required></input>
                    </div>
                        <button type="submit" name="customise_cookies_page" class="btn bg-green-color border-0 w-100 mb-4 ubuntu-r">Customise cookies page</button>

                </form>

            </table>

        </div>
    </div>
</div>


<?php include("../includes/footer_code.php") ?>
