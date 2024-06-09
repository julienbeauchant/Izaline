<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>projet-personnel</title>
</head>

<body>

    <main id="mainProjetPersonnel">
        <div id="ProjetPersonnel" class="titleSection">
            <div class="positionTitleSection">
                <h3>Projets Personnels</h3>
                <p>Voici quelques projets personnels</p>
            </div>
        </div>
        <section class="containerCarouselProjetPersonnel">
            <?php if (isset($_SESSION['id_admin'])) : ?>
                <section id="add-project" class="admin-only">
                    <div id="containerBtnAddProject">
                        <div class="cercleBtnAddProject">
                            <div class="containerImgBtnAddProject">
                                <img src="img/logo-n/plus-n.png" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                <?php include '../app/view/modal.php'; ?>
            <?php endif; ?>

        </section>
    </main>

</body>

</html>