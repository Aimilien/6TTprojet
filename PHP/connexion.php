<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/inscription.css">
    <title>Connexion</title>
</head>
<body>
<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=jeux;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
    $error_msg = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];
    if($email != "" && $mot_de_passe != "") {
        $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $req->execute([$email]);
        $rep = $req->fetch();

        if ($rep && password_verify($mot_de_passe, $rep["mot_de_passe"])) {
            header("Location:succes.php");
            exit();
        } 
        else {
            $error_msg = "Email ou mot de passe incorrect !";
        }
    }
}
?>
    <form method="POST" action="">
        <label for="email">Email</label>
        <input type="email" placeholder="Entrez votre email" id="email" name="email" required>
        <br>
        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" placeholder="Entrez votre mot de passe" id="mot_de_passe" name="mot_de_passe" required>
         <br>
        <input type="submit" value="Se connecter" name="ok">
    </form>

    <?php
    if($error_msg) {
        echo "<p>".$error_msg."</p>";
    }
    ?>
</body>
</html>
