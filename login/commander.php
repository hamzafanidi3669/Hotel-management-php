<?php include '../conn.php'?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['email'])) { 


    $cin_client=$_SESSION['cin'] ;
    if(isset($_POST['service_id'])){
        $id_service=(int)$_POST['service_id'];
    }
    // $id_service = isset($_POST['service_id']) ? (int)$_POST['service_id'] : 0;
    $prix_service = isset($_POST['prix_service']) ? (int)$_POST['prix_service'] : 0;
    $quantite = isset($_POST['quantite_service']) ? (int)$_POST['quantite_service'] : 1;

    $montant_total=$quantite * $prix_service ;
    $query="INSERT into commandes(montant_total,quantite,client_cin,service_id) values('$montant_total','$quantite','$cin_client','$id_service')";
    mysqli_query($conn,$query);
    header("location:services.php?success=achatcommande");
    #nder lih shi alert
}else{
    header('location:form_login.php');
}


?>

