<?php 
    include 'config.php';
?>

<head>
    <link rel="stylesheet" href="sidebar.css">
</head>

<div class="dashboard">
    <h2>Bonjour,
        <?php echo $_SESSION['name'] ?>
    </h2>
    <ul>
        <a href="./addUser.php"><li>Ajouter employé</li></a>
        <a href="./deleteUser.php"><li>Supprimer ou modifier employé</li></a>
        <a href="./fiche.php"><li>Fiche employé</li></a>
        <a href="./liste.php"><li>Liste employés</li></a>
        <a href="./sanctionner.php"><li>Sanctionner employé</li></a>
        <a href="./abscence.php"><li>Marquer abscence</li></a>
        <a href="./conge.php"><li>Ajouter congé</li></a>
        <a href="./dashboard.php" class="back"><li>Tableau de bord</li></a>

        <a href="./logout.php" class="logout"><li>Deconnexion</li></a>
    </ul>
</div>