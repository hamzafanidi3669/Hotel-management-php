<?php
include '../conn.php'; 


    extract($_POST);
    $id=$_POST['id_service'];

    $file_service = $_FILES['file_service'];

    if (empty($nom_service) || empty($description_service) || empty($prix_service) || empty($file_service['name'])) {
        echo "<script> alert('All fields are required.'); window.location.href='update_form_service.php?id=$id '; </script>";
        
    } elseif (!is_numeric($prix_service) || $prix_service <= 0) {
        echo "<script> alert('le prix doit etre >0.'); window.location.href='update_form_service.php?id=$id '; </script>";


    } else {

    // Gérer l'upload de fichier
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($file_service["name"]); // basename pour récupérer le nom du fichier
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // pour avoir l'extension de fichier + strtolower pour convertir en minuscules

    // Vérifier l'extension du fichier
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifier si $uploadOk est à 0 en raison d'une erreur
    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été téléchargé.";
    } else {
        // Essayer de télécharger le fichier
        if (move_uploaded_file($file_service["tmp_name"], $target_file)) {
            echo "Le fichier ". htmlspecialchars(basename($file_service["name"])). " a été téléchargé.";
        
        }
        
        $query="UPDATE services set nom_service='$nom_service',description_service='$description_service',prix_service='$prix_service',image_service='$target_file' where id_service='$id'";

        if (mysqli_query($conn, $query)) {
            header("Location: services.php?success=updateservice"); #ajoutett success=updateservice bash nkhdem beha flmessage de succes
        } else {
            echo "Erreur : " . mysqli_error($conn);
        }
    }
}












?>