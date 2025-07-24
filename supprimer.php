<?php
include 'includes/db.php';

if (!isset($_GET['id'])) {
    die("Identifiant manquant !");
}

$id = (int)$_GET['id'];

// Récupérer l'employé pour afficher son nom dans la confirmation
$stmt = $pdo->prepare("SELECT nom, prenom FROM employes WHERE id = ?");
$stmt->execute([$id]);
$emp = $stmt->fetch();

if (!$emp) {
    die("Employé introuvable !");
}

// Si formulaire de confirmation soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'oui') {
        // Suppression effective
        $stmt = $pdo->prepare("DELETE FROM employes WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: index.php");
        exit;
    } else {
        // Annuler la suppression, retour à la liste
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmer suppression</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Confirmer la suppression</h2>
<p>Voulez-vous vraiment supprimer l'employé <strong><?= htmlspecialchars($emp['prenom'] . ' ' . $emp['nom']) ?></strong> ?</p>

<form method="POST">
    <button type="submit" name="confirm" value="oui" style="background-color:#e74c3c; color:white; padding:10px 15px; border:none; border-radius:5px; cursor:pointer;">
        Oui, supprimer
    </button>
    <button type="submit" name="confirm" value="non" style="padding:10px 15px; border:none; border-radius:5px; cursor:pointer; margin-left:10px;">
        Non, annuler
    </button>
</form>

<a href="index.php" style="display:block; margin-top:20px;">← Retour à la liste</a>

</body>
</html>
