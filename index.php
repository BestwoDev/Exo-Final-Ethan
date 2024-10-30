<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commentaires</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lâche ton commentaire et gagne 10 euros</h1>
    <form method="post" action="">
        <input type="text" name="nom" placeholder="Votre nom" required>
        <textarea name="commentaire" placeholder="Votre commentaire" required></textarea>
        <button type="submit">Envoie ou je te tue</button>
    </form>

    <?php
    session_start();
    if (!isset($_SESSION['commentaires'])) {
        $_SESSION['commentaires'] = [];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = htmlspecialchars($_POST['nom']);
        $commentaire = htmlspecialchars($_POST['commentaire']);
        array_push($_SESSION['commentaires'], ['nom' => $nom, 'commentaire' => $commentaire]);
    }

    echo '<h2>Commentaires :</h2>';
    echo '<ul>';
    foreach ($_SESSION['commentaires'] as $comm) {
        echo "<li><strong>{$comm['nom']}:</strong> {$comm['commentaire']}</li>";
    }
    echo '</ul>';
    ?>
</body>
</html>
