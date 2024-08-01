<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_service = htmlspecialchars(trim($_POST['nom_service']));
    $description_service = htmlspecialchars(trim($_POST['description_service']));
    $prix_service = htmlspecialchars(trim($_POST['prix_service']));
    $file_service = $_FILES['file_service'];


    if (empty($nom_service) || empty($description_service) || empty($prix_service) || empty($file_service['name'])) {
        echo "<script> alert('All fields are required.'); window.location.href='ajouterservice.php'; </script>";
        
    } elseif (!is_numeric($prix_service) || $prix_service <= 0) {
        echo "Price must be a positive number.";
        echo "<script> alert('Price must be a positive number'); window.location.href='ajouterservice.php'; </script>";

    } else {
       
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($file_service["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
          
            if (move_uploaded_file($file_service["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($file_service["name"])). " has been uploaded.";
              
                $query = "INSERT INTO services (nom_service, description_service, prix_service, image_service) 
                          VALUES ('$nom_service', '$description_service', '$prix_service', '$target_file')";
                if (mysqli_query($conn, $query)) {
                    header("Location: ajouterservice.php?success=ajouterservice"); 
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>
