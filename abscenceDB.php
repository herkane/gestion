<?php
    include 'config.php';
    if (isset($_POST['sanction'])) {
        $CIN = $_POST['CIN'];
        $motif = $_POST['motif'];
        $date_dept = $_POST['date_dept'];
        $time_dept = $_POST['time_dept'];
        $date_retour = $_POST['date_retour'];
        $time_retour = $_POST['time_retour'];
        $searchUser = "SELECT * FROM users WHERE CIN = '$CIN'";
        $results = mysqli_query($con,$searchUser);
        if (mysqli_num_rows($results) > 0) {
            $insertSanction = "INSERT INTO abscences (CINadmin,Date_depart,Heure_depart,Date_arrive,Heure_arrive,Motif) VALUES ('$CIN','$date_dept','$time_dept','$date_retour','$time_retour','$motif')";
        } else {
            $insertSanction = "INSERT INTO abscences (CINemp,Date_depart,Heure_depart,Date_arrive,Heure_arrive,Motif) VALUES ('$CIN','$date_dept','$time_dept','$date_retour','$time_retour','$motif')"; 
        }
        $_SESSION['sanction_status'] = mysqli_query($con,$insertSanction);
        echo mysqli_error($con);
        $_SESSION['ShowForm'] = "false";
        header('Location: abscence.php');
    } else if (isset($_POST['add_sanction'])) {
        $_SESSION['ShowForm'] = "true";
        echo $_SESSION['ShowForm'];
        header('Location: abscence.php?achraf=hola');
    } else $_SESSION['ShowForm'] = "false";

    $sanctionList1 = "SELECT * FROM abscences INNER JOIN employes ON abscences.CINemp = employes.CIN";
    $sanctionList2 = "SELECT * FROM abscences INNER JOIN users ON abscences.CINadmin = users.CIN";
    
    $result1 = mysqli_query($con,$sanctionList1);
    $result2 = mysqli_query($con,$sanctionList2);
    
    $_SESSION['liste_sanctions1'] = mysqli_fetch_all($result1);
    $_SESSION['liste_sanctions2'] = mysqli_fetch_all($result2);