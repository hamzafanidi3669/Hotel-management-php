
<?php
include '../conn.php'; 



        
        $cin=$_POST['cin'];
        extract($_POST);


       if (!filter_var($email_client, FILTER_VALIDATE_EMAIL)) {
            echo "<script> alert('Invalid email format.'); window.location.href='signup.php'; </script>";
        }elseif (strlen($nom_client) < 3) {
            echo "<script> alert('Nom must be at least 3 characters long.'); window.location.href='signup.php'; </script>";
        } elseif (strlen($prenom_client) < 3) {
            echo "<script> alert('Prenom must be at least 3 characters long.'); window.location.href='signup.php'; </script>";
        } elseif (strlen($adresse_client) < 6) {
            echo "<script> alert('Adresse must be at least 6 characters long.'); window.location.href='signup.php'; </script>";
        } elseif (!preg_match('/^\d{10}$/', $telephone_client)) {
            echo "<script> alert('Phone number must be exactly 10 digits.'); window.location.href='signup.php'; </script>";
        } else {


        $query="UPDATE clients set nom_client='$nom_client',prenom_client='$prenom_client',email_client='$email_client',telephone_client='$telephone_client',adresse_client='$adresse_client' where cin='$cin'";
        if (mysqli_query($conn, $query)) {
            header("Location: client_info.php?success=modifiedclient"); #ajoutett success=modifiedclient bash nkhdem beha flmessage de succes
        } else {
            echo "Erreur : " . mysqli_error($conn);
        }
    }












?>