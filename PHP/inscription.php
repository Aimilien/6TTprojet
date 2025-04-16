<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/inscription.css">
    <title>Inscription</title>
</head>
<body>
    <form method="POST" action="traitement.php">
        <label for="pseudo">Votre pseudo</label>
        <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo" required> 
        <br>
        <label for="email">Votre email</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre email" required> 
        <br>
        <label for="mot_de_passe">Votre mot de passe</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Entrez votre mot de passe" required> 
        <br>
        <input type="submit" value="S'inscrire" name="ok">
    </form>
</body>
</html>