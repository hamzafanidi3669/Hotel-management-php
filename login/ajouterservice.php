<?php
 include '../parts/navbar.php'; 


//  bash l admin howwa li 3endo la possibilté ydkhol lhad lpage 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(($_SESSION['admin']) == 1) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../parts/navbar.css">

    <style>
        .titreajouterservice {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .formajouterservice {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .formajouterservice .form-group {
            width: 50%;
            margin-bottom: 15px;
        }
        .divbtnahouterservice button{
            background:#DC5F00;
            color:#EEEE;
            
        }
    </style>
</head>
<body>
    <div class="titreajouterservice">
        <h1>Ajouter un service</h1>
    </div>

    <?php if (isset($_GET['success']) && $_GET['success'] == 'ajouterservice'): ?>
        <div class="alert alert-success text-center" role="alert">
            Service ajouté avec succès !
        </div>
    <?php endif; ?>

    <form action="save_service.php" method="post" class="formajouterservice" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="nom_service" class="form-control" placeholder="Nom service">
        </div>
        <div class="form-group">
            <input type="text" name="description_service" class="form-control" placeholder="Description service">
        </div>
        <div class="form-group">
            <input type="number" min="1" required max="10000" name="prix_service" class="form-control" placeholder="Prix service">
        </div>
        <div class="form-group">
            <input type="file" name="file_service" class="form-control" placeholder="Fichier service">
        </div>
        <div class="form-group divbtnahouterservice">
            <button type="submit" class="btn">Ajouter</button>
        </div>
    </form>
</body>
</html>

<?php } else {
    header("Location: home.php");
} ?>
