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
    <link rel="stylesheet" href="./liste.css">
</head>

<body>
    <?php include 'sidebar.php';
    include 'listeFormDB.php'; ?>
    <div class="container">
        <div class="liste">
            <h1 align='center'>Liste des employés</h1>
            <div class="listes">
                    <div style="overflow-x:auto;overflow-y:auto;">
                    <h1>Fonctionnaires</h1>
                        <table border="1">
                            <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>CIN</th>
                            <th>Date Naissance</th>
                            <th>Salaire</th>
                            </tr>
                            <?php for ($i=0; $i < count($_SESSION['listeFonctionnaires']); $i++) { 
                                $info = $_SESSION['listeFonctionnaires'][$i];
                                echo '<tr>
                                        <td>'.$info[1].'</td>
                                        <td>'.$info[2].'</td>
                                        <td>'.$info[3].'</td>
                                        <td>'.$info[4].'</td>
                                        <td>'.$info[5].' MAD</td>
                                    </tr>';
                            } ?>
                            
                        </table>
                        </div>
                        <div style="overflow-x:auto;">
                        <h1>Administrateurs</h1>
                        <table border="1">
                            <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>CIN</th>
                            <th>Date Naissance</th>
                            <th>Salaire</th>
                        </tr>
                        <?php for ($i=0; $i < count($_SESSION['listeAdmins']); $i++) { 
                                $info = $_SESSION['listeAdmins'][$i];
                                echo '<tr>
                                        <td>'.$info[3].'</td>
                                        <td>'.$info[4].'</td>
                                        <td>'.$info[5].'</td>
                                        <td>'.$info[6].'</td>
                                        <td>'.$info[7].' MAD</td>
                                    </tr>';
                            } ?>
                        </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>