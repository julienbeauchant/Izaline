<?php
session_start();

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "connexion";

try {
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $sql = $bdd->prepare("SELECT * FROM admin WHERE email = :email");
        $sql->bindParam(':email', $email);
        $sql->execute();

        if ($sql->rowCount() == 1) {
            $user = $sql->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                $_SESSION['id_admin'] = $user['id_admin'];
                $_SESSION['admin'] = $user['email'];
                header("Location: ../../public/index.php");
                exit();
            } else {
                header("Location: ../view/login.php?error=1");
                exit();
            }
        } else {
            header("Location: ../view/login.php?error=1");
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>






<?php
session_start();

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "connexion";

try {
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $stmt = $bdd->prepare("SELECT * FROM admin WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                $_SESSION['id_admin'] = $user['id_admin'];
                $_SESSION['admin'] = $user['email'];
                header("Location: ../../public/index.php");
                exit();
            } else {
                header("Location: ../view/login.php?error=1");
                exit();
            }
        } else {
            header("Location: ../view/login.php?error=1");
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>





