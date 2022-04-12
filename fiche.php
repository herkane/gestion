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
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./fiche.css">
</head>

<body>
    <?php include 'sidebar.php' ?>
    <div class="container">
        <div class="fiche">
            <h1 align='center'>Fiche d'employé</h1>
            <form action="searchFiche.php" method="POST" enctype='multipart/form-data'>
                <label for="search">Entrez le CIN :</label>
                <input type="searchByCIN" name="searchByCIN" id="search" required>
                <button type="submit" name="searchUser">Rechercher</button>
            </form>
            <div class="results">
                <?php 
                        if (isset($_SESSION['searchUser_status'])) {
                            if ($_SESSION['searchUser_status']) { ?>
                                <div class="card">
                                    <img src="<?php echo './pics/' . $_SESSION["ficheImage"]?>" alt="Employe image">
                                    <div class="half1">
                                        <h2>Nom : <?php echo $_SESSION['ficheNom'] ?></h2>
                                        <h2>Prenom : <?php echo $_SESSION['fichePrenom'] ?></h2>
                                        <h2>CIN : <?php echo $_SESSION['ficheCIN'] ?></h2>
                                        <h2>Date Naissance : <?php echo $_SESSION['ficheDate'] ?></h2>
                                        <h2>Fonction : <?php echo $_SESSION['ficheFonction'] ?></h2>
                                        <h2>Sanctions : <?php echo $_SESSION['ficheSanctions'] ?></h2>
                                        <h2>Salaire : <?php echo $_SESSION['ficheSalaire'] ?> MAD</h2>
                                        <h2>Abscences : <?php echo $_SESSION['ficheAbscence'] ?></h2>
                                    </div>
                                </div>
                            <?php } else  echo '<h3>Employé non trouvé</h3>';
                            unset($_SESSION['searchUser_status']);
                        }
                ?>
                
            </div>
        </div>
    </div>
</body>

</html>