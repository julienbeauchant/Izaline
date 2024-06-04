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



                <form class="file admin-only" id="addProjectForm" method="POST" action="../controllers/traitement-projet-personnel.php">

                    <section id="containerInputFile">

                        <div class="containerImgInputFile">

                            <div class="positionImgInputFile">
                                <img src="img/logo-n/plus-n.png" alt="">
                                <input class="inputFile" type="button">
                            </div>

                        </div>

                    </section>

                </form>            
                
                <!-- <form class="file">

                <section id="containerFileImg">

                    <div class="fileImg">
                        <img src="img/logo-n/trash-n.png" alt="">
                        <input id="inputTrashProjetPersonnel" name="trash" type="button">
                    </div>

                    <div class="fileImg">
                        <img src="img/logo-n/modification.png" alt="">
                        <input id="inputModificationProjetPersonnel" name="modification" type="button" >
                    </div>

                </section>

                <section id="containerImgInputFile">

                    <input id="inputNomProjetPersonnel" name="nom" type="text" >
                    <input id="inputImageProjetPersonnel" name="image" type="image" src="img/coconut_..svg" alt="">
                    <input id="inputUrlProjetPersonnel" name="url" type="url">

                </section>
                
            </form> -->

        </section>

    </main>

    <script>
        // Vérifier si l'utilisateur est connecté en tant qu'administrateur
        let isAdmin = <?php echo isset($_SESSION['admin']) ? 'true' : 'false'; ?>;
        console.log(<?php echo isset($_SESSION['admin']) ? 'true' : 'false'; ?>);

        // Sélectionner le formulaire d'ajout de projet
        let form = document.querySelector('.admin-only');

        // Masquer le formulaire pour les utilisateurs non administrateurs
        if (!isAdmin) {
            form.style.display = 'none';
        };
        console.log(isAdmin)
    </script>

    <script src="js/new-form.js">
        // Vérifier si l'utilisateur est connecté en tant qu'administrateur
        let isAdmin = <?php echo isset($_SESSION['admin']) ? 'true' : 'false'; ?>;
        console.log(isAdmin);
        </script>

        <script src="js/add-form.js"></script>
</body>
</html>