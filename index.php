<?php include 'includes/db.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Annuaire d'entreprise</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <h1>Liste des employés</h1>

    <form method="GET">
        <input type="text" name="search" placeholder="Rechercher un employé...">
        <button type="submit">Rechercher</button>
    </form>

    <a href="ajout.php">➕ Ajouter un employé</a>

    <?php
    $search = $_GET['search'] ?? '';
    $sql = "SELECT * FROM employes WHERE nom LIKE :search OR prenom LIKE :search OR poste LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['search' => "%$search%"]);
    $employes = $stmt->fetchAll();

    if ($employes):
        echo "<table><tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Poste</th><th>Actions</th></tr>";
        foreach ($employes as $emp):
            echo "<tr>
                    <td>{$emp['nom']}</td>
                    <td>{$emp['prenom']}</td>
                    <td>{$emp['email']}</td>
                    <td>{$emp['poste']}</td>
                    <td>
                        <a href='modifier.php?id={$emp['id']}'>✏️</a>
                        <a href='supprimer.php?id={$emp['id']}'>🗑️</a>
                    </td>
                  </tr>";
        endforeach;
        echo "</table>";
    else:
        echo "<p>Aucun employé trouvé.</p>";
    endif;
    ?>
</body>
</html>
