<?php
include '../conn.php'; 

$cin_client = $_GET['cin'];



$query_commande = "DELETE FROM commandes WHERE client_cin='$cin_client'";
mysqli_query($conn, $query_commande) or die(mysqli_error($conn));


$query = "DELETE FROM clients WHERE cin='$cin_client'";
mysqli_query($conn, $query) or die(mysqli_error($conn));


header("location:client_info.php?success=supprimerclient");
// success bash naffichi lmessage derror


?>