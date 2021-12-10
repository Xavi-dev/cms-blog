<?php

include("../includes/header-code.php");

$dataBase = new Basemysql();
$db = $dataBase->connect();

if (isset($_POST['customise_logo'])) {
    $logo = $_FILES['logo']['name'];
    $finalRoute = "../img/img_customise/" . $logo; # Creem una nova ruta d'arxiu
    move_uploaded_file($_FILES['logo']['tmp_name'], $finalRoute); # Movem l'arxiu a la nova ruta.
    $customLogo = new Customise($db);
    $customLogo->createCustomiseLogo($logo);
    $message = "Logo customized.";
}

if (isset($_POST['customise_header_image'])) {
    $header_image = $_FILES['header_image']['name'];
    $finalRoute = "../img/img_customise/" . $header_image; # Creem una nova ruta d'arxiu
    move_uploaded_file($_FILES['header_image']['tmp_name'], $finalRoute); # Movem l'arxiu a la nova ruta.
    $customHeaderImage = new Customise($db);
    $customHeaderImage->createCustomiseHeaderImage($header_image);
    $message = "Header image customized.";
}

if (isset($_POST['customise_social_icon1'])) {
    $social_icon1 = $_FILES['social_icon1']['name'];
    $link_social_icon1 = $_POST['link_social_icon1'];
    $finalRoute = "../img/img_customise/" . $social_icon1; # Creem una nova ruta d'arxiu
    $customSocialIcon1 = new Customise($db);
    $customSocialIcon1->customiseSocialIcon1($social_icon1, $link_social_icon1);
    $message = "Social icon customized.";
}

if (isset($_POST['customise_social_icon2'])) {
    $social_icon2 = $_FILES['social_icon2']['name'];
    $link_social_icon2 = $_POST['link_social_icon2'];
    $finalRoute = "../img/img_customise/" . $social_icon2; # Creem una nova ruta d'arxiu
    $customSocialIcon2 = new Customise($db);
    $customSocialIcon2->customiseSocialIcon2($social_icon2, $link_social_icon2);
    $message = "Social icon customized.";
}

if (isset($_POST['customise_social_icon3'])) {
    $social_icon3 = $_FILES['social_icon3']['name'];
    $link_social_icon3 = $_POST['link_social_icon3'];
    $finalRoute = "../img/img_customise/" . $social_icon3; # Creem una nova ruta d'arxiu
    $customSocialIcon3 = new Customise($db);
    $customSocialIcon3->customiseSocialIcon3($social_icon3, $link_social_icon3);
    $message = "Social icon customized.";
}

if (isset($_POST['customise_social_icon4'])) {
    $social_icon4 = $_FILES['social_icon4']['name'];
    $link_social_icon4 = $_POST['link_social_icon4'];
    $finalRoute = "../img/img_customise/" . $social_icon4; # Creem una nova ruta d'arxiu
    $customSocialIcon4 = new Customise($db);
    $customSocialIcon4->customiseSocialIcon2($social_icon4, $link_social_icon4);
    $message = "Social icon customized.";
}

if (isset($_POST['customise_social_icon5'])) {
    $social_icon5 = $_FILES['social_icon5']['name'];
    $link_social_icon5 = $_POST['link_social_icon5'];
    $finalRoute = "../img/img_customise/" . $social_icon5; # Creem una nova ruta d'arxiu
    $customSocialIcon5 = new Customise($db);
    $customSocialIcon5->customiseSocialIcon5($social_icon5, $link_social_icon5);
    $message = "Social icon customized.";
}

if (isset($_POST['customise_footer_text'])) {
    $footer_text = $_POST['text'];
    $customFooterText = new Customise($db);
    $customFooterText->createFooterText($footer_text);
    $message = "Footer text customized.";
}

?>


<div class="row">
    <div class="col-sm-22">
        <?php if (isset($error)) : ?>
            <div class="alert bg-red-color alert-dismissible fade show message" role="alert">
                <?php echo $error; ?>
                <button type="button" class="btn-close" id="x-alert" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-22">
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
        <div class="col-22 mb-2">
            <h2 class="ubuntu-r">Customise your blog</h2>
        </div>
    </div>

    <div class="row table-responsive">
        <div class="col-22">

            <table class="table" style="width:200%">

                <form method="POST" enctype="multipart/form-data">

                    <div class="mb-2">
                        <label for="logo" class="form-label"><strong>Logo:</strong></label>
                        <input type="file" class="form-control" name="logo">
                    </div>
                    <button type="submit" name="customise_logo" class="btn bg-green-color border-0 w-100 mb-5 ubuntu-r">Customise logo</button>

                </form>

                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="header_image" class="form-label"><strong>Header image:</strong></label>
                        <input type="file" class="form-control" name="header_image">
                    </div>
                    <button type="submit" name="customise_header_image" class="btn bg-green-color border-0 w-100 mb-5 ubuntu-r">Customise header image</button>
                </form>

                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="social_icon1" class="form-label"><strong>Social icon 1:</strong></label>
                        <input type="file" class="form-control" name="social_icon1">
                    </div>
                    <div class="mb-2">
                        <label for="link_social_icon1" class="form-label"><strong>Social icon link 1:</strong></label>
                        <input type="text" class="form-control" name="link_social_icon1" placeholder="www.example.com">
                    </div>
                    <button type="submit" name="customise_social_icon1" class="btn bg-green-color border-0 w-100 mb-5 ubuntu-r">Customise social icon 1</button>
                </form>

                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="social_icon2" class="form-label"><strong>Social icon 2:</strong></label>
                        <input type="file" class="form-control" name="social_icon2">
                    </div>
                    <div class="mb-2">
                        <label for="link_social_icon2" class="form-label"><strong>Social icon link 2:</strong></label>
                        <input type="text" class="form-control" name="link_social_icon2" placeholder="www.example.com">
                    </div>
                    <button type="submit" name="customise_social_icon2" class="btn bg-green-color border-0 w-100 mb-5 ubuntu-r">Customise social icon 2</button>
                </form>

                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="social_icon3" class="form-label"><strong>Social icon 3:</strong></label>
                        <input type="file" class="form-control" name="social_icon3">
                    </div>
                    <div class="mb-2">
                        <label for="link_social_icon3" class="form-label"><strong>Social icon link 3:</strong></label>
                        <input type="text" class="form-control" name="link_social_icon3" placeholder="www.example.com">
                    </div>
                    <button type="submit" name="customise_social_icon3" class="btn bg-green-color border-0 w-100 mb-5 ubuntu-r">Customise social icon 3</button>
                </form>

                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="social_icon4" class="form-label"><strong>Social icon 4:</strong></label>
                        <input type="file" class="form-control" name="social_icon4">
                    </div>
                    <div class="mb-2">
                        <label for="link_social_icon4" class="form-label"><strong>Social icon link 4:</strong></label>
                        <input type="text" class="form-control" name="link_social_icon4" placeholder="www.example.com">
                    </div>
                    <button type="submit" name="customise_social_icon4" class="btn bg-green-color border-0 w-100 mb-5 ubuntu-r">Customise social icon 4</button>
                </form>

                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="social_icon5" class="form-label"><strong>Social icon 5:</strong></label>
                        <input type="file" class="form-control" name="social_icon5">
                    </div>
                    <div class="mb-2">
                        <label for="link_social_icon5" class="form-label"><strong>Social icon link 5:</strong></label>
                        <input type="text" class="form-control" name="link_social_icon5" placeholder="www.example.com">
                    </div>
                    <button type="submit" name="customise_social_icon5" class="btn bg-green-color border-0 w-100 mb-5 ubuntu-r">Customise social icon 5</button>
                </form>

                <form method="POST">

                    <div class="mb-2">
                        <label for="footer_text"><strong>Footer text:</strong></label></br>
                        <textarea class="form-control" name="text" style="height: 300px;"></textarea>
                    </div>
                    <small></small>
                    <button type="submit" name="customise_footer_text" class="btn bg-green-color border-0 w-100 mb-5 ubuntu-r">Customise footer text</button>

                </form>

            </table>

        </div>
    </div>
</div>


<?php include("../includes/footer_code.php") ?>
