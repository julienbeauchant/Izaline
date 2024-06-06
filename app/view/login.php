<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../public/css/global.css">
    <link rel="stylesheet" href="../../public/css/login.css">

    <link rel="stylesheet" href="../../public/css/mediaqueries/mediaqueries-login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>sign in</title>
</head>

<body>
<!-- <?php
echo "Session admin: " . (isset($_SESSION['admin']) ? 'active' : 'inactive');
?> -->

    <section id="containerAdmin">

        <form class="positionAdmin" method="POST" action="../controller/traitement-login.php">

            <h1 id="h1Admin">Sign in</h1>
            <p id="pTitleAdmin">Enter details below</p>

            <section id="containerInputAdmin">

                <div class="inputAdmin">
                    <input type="email" name="email" id="name" placeholder="Enter your email" required>
                </div>

                <div class="inputAdmin">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>

                <div class="inputAdmin">
                    <input type="submit" name="submit" id="submit" value="Connexion">
                </div>

            </section>

            <section id="pAdmin">

                <div class="pAdminLeft">
                    <a href="../../public/index.php">retour au site</a>
                </div>

            </section>
            
        </form>

    </section>

</body>
</html>