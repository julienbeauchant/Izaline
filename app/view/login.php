<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../public/css/global.css">
    <link rel="stylesheet" href="../../public/css/login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Connexion</title>
</head>

<body>

    <section id="containerAdmin">

        <form class="positionAdmin" method="POST" action="../controller/traitement-login.php">
            <h1 id="h1Admin">Connexion</h1>
            <p id="pTitleAdmin">Entrez les informations</p>
            <section id="containerInputAdmin">
                <!-- ajoute la classe error, bordures rouges si l'email ou le mot de passe sont faux -->
                <div class="inputAdmin <?php echo isset($_GET['error']) ? 'error' : ''; ?>">
                    <input type="email" name="email" id="name" placeholder="E-mail" required>
                </div>
                <div class="inputAdmin <?php echo isset($_GET['error']) ? 'error' : ''; ?>">
                    <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                </div>
                <div class="inputAdmin">
                    <input type="submit" name="submit" id="submit" value="Se connecter">
                </div>
            </section>

            <section id="pAdmin">
                <a href="../../public/index.php">retour au site</a>
            </section>
        </form>

    </section>

</body>

</html>