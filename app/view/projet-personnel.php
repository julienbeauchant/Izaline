<?php
session_start();
?>

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
            <?php include '../app/view/modal-update.php'; ?>
        <?php endif;
        require '../app/model/project.php';
        foreach ($project as $newProject) {

        ?>
            <section class="project">
                <div class="containerProjectIcon">
                    <?php if (isset($_SESSION['id_admin'])) : ?>
                        <div class="projectIcon">
                            <a href="../app/model/delete.php?id_projets_personnels=<?php echo $newProject["id_projets_personnels"] ?>"><img class="projectIconTrash" src="img/logo-n/trash-n.png" alt=""></a>
                        </div>
                        <div class="projectIcon">
                            <img class="projectIconModification" src="img/logo-n/modification.png" data-id="<?php echo $newProject["id_projets_personnels"] ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>
                <section class="containerInfoProject">
                    <p id="nameProject"></p>
                    <img id="imgProject" src="img/img-project/<?php echo $newProject["img"] ?>" alt="">
                    <a href="<?php echo $newProject["url"] ?>" id="urlProject"></a>
                </section>
            </section>
        <?php }
        ?>

    </section>
</main>