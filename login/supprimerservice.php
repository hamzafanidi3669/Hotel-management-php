<?php
include '../conn.php'; 
$id_service = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query_delete_commandes = "DELETE FROM commandes WHERE service_id = $id_service";
mysqli_query($conn, $query_delete_commandes) or die(mysqli_error($conn));


$query="DELETE from services where id_service='$id_service'";
mysqli_query($conn,$query);
header("location:services.php?success=supprimerservice");
// success bash naffichi lmessage derror


?>