<?php
 include '../parts/navbar.php'; 
 include '../conn.php'; 



//  bash l admin howwa li 3endo la possibilté ydkhol lhad lpage 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$cin=$_GET["cin"] ;
$query="SELECT * from clients where cin='$cin' " ;
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

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
        .formajouterclient {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .formajouterclient .form-group {
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
        <h1>Modifier un client</h1>
    </div>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="alert alert-success text-center" role="alert">
            Client modifié avec succès !
        </div>
    <?php endif; ?>

    <form action="modifier_save.php" method="POST" class="formajouterclient">
        <div class="form-group">
            <input type="text" name="nom_client" class="form-control" value="<?= $row['nom_client'] ?>">
            <input type="hidden" name="cin" class="form-control" value="<?= $row['cin'] ?>" >
        </div>
        <div class="form-group">
            <input type="text" name="prenom_client" class="form-control" value="<?= $row['prenom_client'] ?>">
        </div>
        <div class="form-group">
            <input type="text" name="email_client" class="form-control" value="<?= $row['email_client'] ?>">
        </div>
        <div class="form-group">
            <input type="text" name="telephone_client" class="form-control" value="<?= $row['telephone_client'] ?>">
        </div>
        <div class="form-group">
            <input type="text" name="adresse_client" class="form-control" value="<?= $row['adresse_client'] ?>">
        </div>
        <div class="form-group divbtnahouterservice">
            <button type="submit" class="btn">Modifier</button>
        </div>
    </form>
</body>
</html>

<?php } else {
    header("Location: home.php");
} ?>
