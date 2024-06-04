<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$db = "projets_personnels";

$dsn = "mysql:host=$serverName;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $userName, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $img = $_POST['img'] ?? '';
        $url = $_POST['url'] ?? '';

        if ($nom && $img && $url) {
            $stmt = $pdo->prepare("INSERT INTO projets_personnels (nom, img, url) VALUES (:nom, :img, :url)");
            $stmt->execute(['nom' => $nom, 'img' => $img, 'url' => $url]);
            
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Tous les champs sont requis."]);
        }
    }
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
?>

