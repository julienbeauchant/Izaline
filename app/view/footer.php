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
                    echo '<a href="../app/controller/logout.php"><img id="deconnexion" src="img/logo-b/deconnexion-b.png" alt="icon deconnexion" title="se déconnecter"></a>';
                } else {
                    echo '<a href="../app/view/login.php"><img id="user" src="img/logo-b/utilisateur-b.png" alt="icon connexion"></a>';
                }
                ?>
            </div>
        </div>
    </section>

</footer>

<script src="js/theme.js"></script>