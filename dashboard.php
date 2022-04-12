<?php 
    include 'config.php';
    session_start();
    if (!$_SESSION['started']) {
        header('Location: 404.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tableau de bord</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <h1>Bonjour,
        <?php echo $_SESSION['name'] ?>
    </h1>
    <div class="tools">
        <div class="tool1">
            <a href="./addUser.php"> <img src="./add.ico" alt="Add user"> Ajouter employé</a>
            <a href="./deleteUser.php"> <img src="./remove.ico" alt="Remove user"> Supprimer employé</a>
            <a href="./deleteUser.php"> <img src="./edit.ico" alt="Edit user"> Modifier employé</a>
            <a href="./fiche.php"> <img src="./search.ico" alt="Search user"> Fiche employé</a>
        </div>
        <div class="tool2">
            <a href="./liste.php"> <img src="./list.ico" alt="List users"> Liste employés</a>
            <a href="./sanctionner.php"> <img src="./warn.ico" alt="Warn user"> Sanctionner employé</a>
            <a href="./abscence.php"> <img src="./abscence.ico" alt="Abscence"> Marquer abscence</a>
            <a href="./conge.php"> <img src="./conge.ico" alt="Conge"> Ajouter congé</a>
        </div>
    </div>
    <a href="./logout.php" class="logout">Se deconnecter</a>
</body>

</html>