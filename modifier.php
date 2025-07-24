<?php
include 'includes/db.php';

if (!isset($_GET['id'])) {
    die("Identifiant manquant !");
}

$id = (int)$_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE employes SET nom=?, prenom=?, email=?, poste=?, date_embauche=? WHERE id=?");
    $stmt->execute([
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['email'],
        $_POST['poste'],
        $_POST['date_embauche'],
        $id
    ]);
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM employes WHERE id=?");
$stmt->execute([$id]);
$emp = $stmt->fetch();

if (!$emp) {
    die("Employé introuvable !");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un employé</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Modifier un employé</h2>
<form method="POST">
    <input name="nom" value="<?= htmlspecialchars($emp['nom']) ?>" required>
    <input name="prenom" value="<?= htmlspecialchars($emp['prenom']) ?>" required>
    <input name="email" type="email" value="<?= htmlspecialchars($emp['email']) ?>" required>
    <input name="poste" value="<?= htmlspecialchars($emp['poste']) ?>">
    <input name="date_embauche" type="date" value="<?= $emp['date_embauche'] ?>">
    <button type="submit">Enregistrer</button>
</form>

<a href="index.php">← Retour</a>

</body>
</html>
