<?php
    include 'config.php';
    if (isset($_POST['sanction'])) {
        $CIN = $_POST['CIN'];
        $motif = $_POST['motif'];
        $details = $_POST['details'];
        $searchUser = "SELECT * FROM users WHERE CIN = '$CIN'";
        $results = mysqli_query($con,$searchUser);
        if (mysqli_num_rows($results) > 0) {
            $insertSanction = "INSERT INTO sanctions (CINadmin,Motif,Details) VALUES ('$CIN','$motif','$details')";
        } else {
            $insertSanction = "INSERT INTO sanctions (CINemp,Motif,Details) VALUES ('$CIN','$motif','$details')";
            
        }
        $_SESSION['sanction_status'] = mysqli_query($con,$insertSanction);
        $_SESSION['ShowForm'] = "false";
        header('Location: sanctionner.php');
    } else if (isset($_POST['add_sanction'])) {
        $_SESSION['ShowForm'] = "true";
        echo $_SESSION['ShowForm'];
        header('Location: sanctionner.php?achraf=hola');
    } else $_SESSION['ShowForm'] = "false";

    
    $sanctionList1 = "SELECT * FROM sanctions INNER JOIN employes ON sanctions.CINemp = employes.CIN ORDER BY CINemp";
    $sanctionList2 = "SELECT * FROM sanctions INNER JOIN users ON sanctions.CINadmin = users.CIN ORDER BY CINadmin";
    
    $result1 = mysqli_query($con,$sanctionList1);
    $result2 = mysqli_query($con,$sanctionList2);
    
    $_SESSION['liste_sanctions1'] = mysqli_fetch_all($result1);
    $_SESSION['liste_sanctions2'] = mysqli_fetch_all($result2);

    
    
    