<?php include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO employes (nom, prenom, email, poste, date_embauche) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['poste'], $_POST['date_embauche']]);
    header("Location: index.php");
}
?>
<link rel="stylesheet" href="css/style.css">

<form method="POST">
    <input name="nom" placeholder="Nom" required>
    <input name="prenom" placeholder="Prénom" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="poste" placeholder="Poste">
    <input name="date_embauche" type="date">
    <button type="submit">Ajouter</button>
</form>
