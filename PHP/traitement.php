<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=jeux;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['ok'])) {
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];
    $mot_de_passe_hashed = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $score_total = 0;
    $niveau = 1;

    try {
        $requete = $bdd->prepare("INSERT INTO utilisateurs (pseudo, email, mot_de_passe, score_total, niveau) VALUES (:pseudo, :email, :mot_de_passe, :score_total, :niveau)");
        $requete->execute(
            array(
                "pseudo" => $pseudo,
                "email" => $email,
                "mot_de_passe" => $mot_de_passe_hashed,
                "score_total" => $score_total,
                "niveau" => $niveau
            )
        );
        echo "Inscription réussie <br> <a href='connexion.php'>Cliquez pour vous connecter</a>";

    } catch (PDOException $e) {
        echo 'Erreur dans la requête : ' . $e->getMessage();
    }
}
?>