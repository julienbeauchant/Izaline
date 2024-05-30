<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/global.css">

    <link rel="stylesheet" href="../css/mediaqueries/mediaqueries-footer.css">
    <link rel="stylesheet" href="../css/mediaqueries/mediaqueries-global.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <title>footer</title>
</head>

<body>

<footer>

        <section id="footerSectionLeft">
            <div class="footerContainerSectionLeft">
                <div class="containerFacebook">
                    <a href=""><img id="facebook" src="../img/logo-b/facebook-b.png" alt=""></a>
                </div>
                <div class="containerIntagram">
                    <a href=""><img id="instagram" src="../img/logo-b/instagram-b.png" alt=""></a>
                </div>
                <div class="containertiktok">
                    <a href=""><img id="tiktok" src="../img/logo-b/tiktok-b.png" alt=""></a>
                </div>
            </div>
        </section>

        <section id="footerSectionRight">
            <div class="footerContainerSectionRight">
            <?php
                require 'theme.php';
            ?>
                <div class="containerUser">
                    <a href="admin.php"><img id="user" src="../img/logo-b/utilisateur-2.png" alt=""></a>
                </div>
            </div>
        </section>

    </footer>

    <script src="../js/theme.js"></script>

</body>

</html>