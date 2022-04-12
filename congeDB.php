<?php
    include 'config.php';
    if (isset($_POST['sanction'])) {
        $CIN = $_POST['CIN'];
        $date_dept = $_POST['date_dept'];
        $date_retour = $_POST['date_retour'];
        $searchUser = "SELECT * FROM users WHERE CIN = '$CIN'";
        $results = mysqli_query($con,$searchUser);
        if (mysqli_num_rows($results) > 0) {
            $insertSanction = "INSERT INTO conge (CINadmin,Date_depart,Date_arrive) VALUES ('$CIN','$date_dept','$date_retour')";
        } else {
            $insertSanction = "INSERT INTO conge (CINemp,Date_depart,Date_arrive) VALUES ('$CIN','$date_dept','$date_retour')"; 
        }
        $_SESSION['sanction_status'] = mysqli_query($con,$insertSanction);
        echo mysqli_error($con);
        $_SESSION['ShowForm'] = "false";
        header('Location: conge.php');
    } else if (isset($_POST['add_sanction'])) {
        $_SESSION['ShowForm'] = "true";
        echo $_SESSION['ShowForm'];
        header('Location: conge.php?achraf=hola');
    } else $_SESSION['ShowForm'] = "false";

    $sanctionList1 = "SELECT * FROM conge INNER JOIN employes ON conge.CINemp = employes.CIN";
    $sanctionList2 = "SELECT * FROM conge INNER JOIN users ON conge.CINadmin = users.CIN";
    
    $result1 = mysqli_query($con,$sanctionList1);
    $result2 = mysqli_query($con,$sanctionList2);
    
    $_SESSION['liste_sanctions1'] = mysqli_fetch_all($result1);
    $_SESSION['liste_sanctions2'] = mysqli_fetch_all($result2);