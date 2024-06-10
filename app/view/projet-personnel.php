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
            <?php endif; 
            require '../app/model/project.php';
            foreach($project as $newProject){
            
            ?>
            <section class="project">
                <div class="containerProjectIcon">
                <?php if (isset($_SESSION['id_admin'])) : ?>
                    <div class="projectIcon">
                        <a href="../app/model/delete.php?id_projets_personnels=<?php echo $newProject ["id_projets_personnels"] ?>"><img class="projectIconTrash" src="img/logo-n/trash-n.png" alt=""></a>
                    </div>
                    <div class="projectIcon">
                    <a href="../app/model/update.php?id_projets_personnels=<?php echo $newProject ["id_projets_personnels"] ?>"><img class="projectIconModification" src="img/logo-n/modification.png" alt=""></a>
                    </div>
                    <?php endif; ?>
                </div>
                <section class="containerInfoProject">
                    <p id="nameProject"></p>
                    <img id="imgProject" src="img/img-project/<?php echo $newProject ["img"] ?>" alt="">
                    <a href="<?php echo $newProject ["url"] ?>" id="urlProject"></a>
                </section>
            </section>
                <?php }
                ?>

        </section>
    </main>

</body>

</html>