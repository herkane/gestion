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
        <title>Supprimer employé</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./deleteUser.css">
    </head>

    <body>
        <?php include 'sidebar.php' ?>
        <div class="container">
        <div class="deleteUser">
            <h1>Supprimer ou modifier un employé</h1>
            <form action="deleteUserFromDB.php" method="POST">
                <label for="search">Entrez le CIN :</label>
                <input type="search" name="search" id="search" required>
                <button type="submit" name="searchUserToDelete">Supprimer</button>
                <button type="submit" name="searchUserToModify">Modifier</button>
            </form>
            <div class="results">
            <?php
                if (isset($_SESSION['searchUserToDelete_status'])) {
                    if ($_SESSION['searchUserToDelete_status']) {
                        echo "<h1>Vous etes sûr de supprimer ce employé ?</h1><br>";
                        echo '<div style="overflow-x:auto;">
                        <table border="1">
                        <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>CIN</th>
                                <th>Date Naissance</th>
                                <th>Salaire</th>
                        </tr>
                        <tr>
                        <td>'.$_SESSION['modifyNom'].'</td>
                                <td>'.$_SESSION['modifyPrenom'].'</td>
                                <td>'.$_SESSION['modifyCIN'].'</td>
                                <td>'.$_SESSION['modifyDate'].'</td>
                                <td>'.$_SESSION['modifySalaire'].' MAD</td>
                        </tr>
                        </table></div><br>
                        <form action="deleteUserFromDB.php" method="POST">
                        <button name = "yes">Oui</button><button name = "no">Non</button>
                        </form>';
                    } else echo '<h2>Employé non trouvée</h2>';
                    unset($_SESSION['searchUserToDelete_status']);
                }
                else if (isset($_SESSION['delete_status'])) {
                    if ($_SESSION['delete_status']) {
                        echo '<h2>Employé supprimé</h2><br>';
                        echo '<div style="overflow-x:auto;">
                        <table border="1">
                        <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>CIN</th>
                                <th>Date Naissance</th>
                                <th>Salaire</th>
                        </tr>
                        <tr>
                        <td>'.$_SESSION['deleteNom'].'</td>
                                <td>'.$_SESSION['deletePrenom'].'</td>
                                <td>'.$_SESSION['deleteCIN'].'</td>
                                <td>'.$_SESSION['deleteDate'].'</td>
                                <td>'.$_SESSION['deleteSalaire'].' MAD</td>
                        </tr>
                        </table></div>';
                    } else echo '<h2>Employé non trouvé</h2>';
                    unset($_SESSION['delete_status']);
                } else if (isset($_SESSION['search_status'])) {
                    if ($_SESSION['search_status']) {
                        echo '
                        <head>
                            <link rel="stylesheet" href="./modifyUser.css">
                        </head>
                        <form class="modifyForm" action="./deleteUserFromDB.php" method="POST" enctype=' . 'multipart/form-data>
                        <div class="input">
                            <div class="form1">
                                <div>
                                    <label for="nom">Nom employé :</label>
                                    <input type="text" name="nom" value = '.$_SESSION["modifyNom"].' id="nom" required>
                                </div>
                                <div>
                                    <label for="prenom">Prenom employé :</label>
                                    <input type="text" name="prenom" id="prenom" value = '.$_SESSION['modifyPrenom'].' required>
                                </div>
                                <div>
                                    <label for="CIN">CIN employé :</label>
                                    <input type="text" name="CIN" id="cin" value = '.$_SESSION['modifyCIN'].' disabled>
                                </div>
                                <div>
                                    <label for="date_naissance">Date de naissance :</label>
                                    <input type="date" name="date_naissance" id="date_naissance" value = '.$_SESSION['modifyDate'].' required>
                                </div>
                                <div>
                                    <label for="salaire">Salaire employé :</label>
                                    <input type="number" name="salaire" id="salaire" value = '.$_SESSION['modifySalaire'].' required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="modify" id="ajouter">Modifier</button>
                        </form> '; 
                    } else echo '<h2>Employé non trouvé</h2>';
                    unset($_SESSION['search_status']);
                } else if (isset($_SESSION['modify_status'])) {
                    if ($_SESSION['modify_status']) {
                        echo '<h2>Employé modifié</h2>';
                        echo '<div style="overflow-x:auto;">
                        <table border="1">
                        <tr>
                            <th>CIN</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date Naissance</th>
                            <th>Salaire</th>
                        </tr>
                        <tr>
                            <td>'.$_SESSION['modifyCIN'].'</td>
                            <td>'.$_SESSION['modifyNom'].'</td>
                            <td>'.$_SESSION['modifyPrenom'].'</td>
                            <td>'.$_SESSION['modifyDate'].'</td>
                            <td>'.$_SESSION['modifySalaire'].' MAD</td>
                        </tr>
                        </table></div>';
                    }
                    unset($_SESSION['modify_status']);
                }
            ?>
            </div>
        </div>
        </div>
    </body>

    </html>