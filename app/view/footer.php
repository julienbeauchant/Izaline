    <?php
    session_start();
    ?>

    <footer>

        <section id="footerSectionLeft">
            <div class="footerContainerSectionLeft">
                <div class="containerFacebook">
                    <a href=""><img id="facebook" src="img/logo-b/facebook-b.png" alt=""></a>
                </div>
                <div class="containerIntagram">
                    <a href=""><img id="instagram" src="img/logo-b/instagram-b.png" alt=""></a>
                </div>
                <div class="containertiktok">
                    <a href=""><img id="tiktok" src="img/logo-b/tiktok-b.png" alt=""></a>
                </div>
            </div>
        </section>

        <section id="footerSectionRight">
            <div class="footerContainerSectionRight">
                <?php
                require 'theme.php';
                ?>
                <div class="containerUser">
                    <?php
                    if (isset($_SESSION['admin'])) {
                        // Si l'utilisateur est connecté en tant qu'administrateur, afficher le lien de déconnexion
                        echo '<a href="../app/controller/logout.php"><img id="user" src="img/logo-b/deconnexion-b.png" alt=""></a>';
                    } else {
                        // Sinon, afficher le lien de connexion
                        echo '<a href="../app/view/login.php"><img id="user" src="img/logo-b/utilisateur-b.png" alt=""></a>';
                    }
                    ?>
                </div>
            </div>
        </section>

    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Vérifier si l'utilisateur est un administrateur
            let isAdmin = <?php echo isset($_SESSION['admin']) ? 'true' : 'false'; ?>;
            console.log("isAdmin:", isAdmin);

            // Afficher le formulaire si l'utilisateur est un administrateur
            if (isAdmin) {
                document.querySelectorAll('.admin-only').forEach(function(element) {
                    element.style.display = 'flex';
                });

                // Changer l'image du user pour l'administrateur
                let userImg = document.getElementById('user');
                userImg.src = "img/logo-b/deconnexion-b.png";
                userImg.style.cursor = "pointer";
                userImg.addEventListener('click', function() {
                    console.log("Déconnexion en cours...");
                    // window.location.href = "logout.php";
                });
            }
        });
    </script>

    <script src="../js/theme.js"></script>