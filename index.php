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
        <!-- Champ de texte pour le nom -->
        <input type="text" name="nom" placeholder="Votre nom" required>
        <!-- Champ de texte pour le commentaire -->
        <textarea name="commentaire" placeholder="Votre commentaire" required></textarea>
        <button type="submit">Envoie ou je te tue</button>
    </form>

    <?php
    // Démarre la session
    session_start();
    // Initialisation d'un tableau
    if (!isset($_SESSION['commentaires'])) {
        $_SESSION['commentaires'] = [];
    }
    // Vérifie si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération et sécurisation des donnée
        $nom = htmlspecialchars($_POST['nom']);
        $commentaire = htmlspecialchars($_POST['commentaire']);
        // Ajoute le commentaire au tableau des commentaires
        array_push($_SESSION['commentaires'], ['nom' => $nom, 'commentaire' => $commentaire]);
    }
    // La liste des commentaires
    echo '<h2>Commentaires :</h2>';
    echo '<ul>';
    foreach ($_SESSION['commentaires'] as $comm) {
        echo "<li><strong>{$comm['nom']}:</strong> {$comm['commentaire']}</li>";
    }
    echo '</ul>';
    ?>
</body>
</html>
