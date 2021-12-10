<?php

include("../includes/header-code.php");

$dataBase = new Basemysql();
$db = $dataBase->connect();

if (isset($_POST['customise_privacy_page'])) {
    $privacy_text = $_POST['text'];
    $privacy_text_link = $_POST['privacy_text_link'];
    $customPrivacyText = new Legals($db);
    $customPrivacyText->createPrivacyPage($privacy_text, $privacy_text_link);
    $message = "Privacy page successfully created.";
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
        <div class="col-12 mb-1 mt-2">
            <h2 class="ubuntu-r">Create your privacy page</h2>
        </div>
    </div>

    <div class="row table-responsive">
        <div class="col-12">

            <table class="table" style="width:100%">

                <form method="POST">

                    <div class="mb-1">
                        <label for="privacy_text"><strong>Text:</strong></label>
                        <textarea class="form-control" name="text" style="height: 170px;"></textarea>
                    </div>
                    
                    <div class="mb-1">
                        <label for="privacy_text_link"><strong>Privacy page link:</strong></label>
                        <input type="text" class="form-control" name="privacy_text_link"></input>
                    </div>
                        <button type="submit" name="customise_privacy_page" class="btn bg-green-color border-0 w-100 mb-4 ubuntu-r">Customise privacy page</button>

                </form>

            </table>

        </div>
    </div>
</div>


<?php include("../includes/footer_code.php") ?>
