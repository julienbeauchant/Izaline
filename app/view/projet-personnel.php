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



            <section id="add-project" class="admin-only">
                <div id="containerBtnAddProject">
                    <div class="cercleBtnAddProject">
                        <div class="containerImgBtnAddProject">
                            <img src="img/logo-n/plus-n.png" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <?php
            require 'modal.php'
            ?>

            <section class="project">
                <div class="containerProjectIcon">
                    <div class="projectIcon">
                        <img class="projectIconTrash" src="img/logo-n/trash-n.png" alt="">
                    </div>
                    <div class="projectIcon">
                        <img class="projectIconModification" src="img/logo-n/modification.png" alt="">
                    </div>
                </div>
                <section class="containerInfoProject">
                    <p id="nameProject" name="nom" type="text" >
                    <img id="imgProject" src="" alt="">
                    <a href="" id="urlProject"></a>
                </section>
            </section>
        </section>

    </main>

    <script>
        // Vérifier si l'utilisateur est connecté en tant qu'administrateur
        let isAdmin = <?php echo isset($_SESSION['admin']) ? 'true' : 'false'; ?>;
    </script>

    <script src="js/add-project.js"></script>
</body>

</html>