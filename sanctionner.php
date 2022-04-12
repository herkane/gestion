<?php 
    session_start();
    if (!$_SESSION['started']) {
        header('Location: 404.php');
}?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajouter employé</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./sanctionner.css">
</head>

<body>
    <?php include 'sidebar.php';
        include 'sanctionnerDB.php';
        ?>
        <div class="container">
        <div class="addSanction">
            <?php if (!isset($_GET['achraf']) || $_GET['achraf'] != 'hola') {?> 
                <h1>Liste des sanctions</h1>
                <form action="./sanctionnerDB.php" method="POST">
                <button name="add_sanction">Ajouter sanction</button>
                </form>
            <div style="overflow-x:auto;overflow-y:auto;">
                <table border="1" style="text-align: center;">
                    <tr>
                        <th>CIN</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Fonction</th>
                        <th>Motif</th>
                        <th>Details</th>
                    </tr>
                <?php for ($i=0; $i < count($_SESSION['liste_sanctions1']); $i++) { 
                        $info = $_SESSION['liste_sanctions1'][$i];
                echo '<tr>
                    <td>'.$info[1].'</td>
                    <td>'.$info[6].'</td>
                    <td>'.$info[7].'</td>
                    <td>Fonctionnaire</td>
                    <td>'.$info[3].'</td>
                    <td>'.$info[4].'</td>
                </tr>';
                }?>
                <?php for ($i=0; $i < count($_SESSION['liste_sanctions2']); $i++) { 
                        $info = $_SESSION['liste_sanctions2'][$i];
                echo '<tr>
                    <td>'.$info[2].'</td>
                    <td>'.$info[8].'</td>
                    <td>'.$info[9].'</td>
                    <td>Administrateur</td>
                    <td>'.$info[3].'</td>
                    <td>'.$info[4].'</td>
                </tr>';
                }?>
            </table>
        </div>
            <?php } ?>
        <div class="sanction">
            <?php if (isset($_GET['achraf'])) {
                if ($_GET['achraf'] === 'hola') { ?>
                    <form action="./sanctionnerDB.php" method="POST" enctype='multipart/form-data'>
                        <h1>Sanctionner un employé</h1>
                        <div>
                            <div>
                                <label for="nom">CIN employé :</label>
                                <input type="text" name="CIN" id="nom" required>
                            </div>
                            <div>
                                <label for="prenom">Motif de sanction :</label>
                                <input type="text" name="motif" id="prenom" required>
                            </div>
                            <div>
                                <label for="CIN">Détails de sanction :</label>
                                <textarea name="details" id="sanction" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <button type="submit" name="sanction" id="sanction">Sanctionner</button>
                        <?php if(isset($_SESSION['sanction_status'])) {
                            if ($_SESSION['sanction_status']) {
                        ?>
                        <h2>Sanction envoyé</h2>
                        <?php        
                            }
                            unset($_SESSION['sanction_status']);
                        }?>
                    </form>
               <?php }
               $_GET['achraf'] = 'hi';
            } ?>
    </div>
    </div>
</body>

</html>