<?php 
include '../conn.php';
include '../parts/navbar.php';



$query= "SELECT * from clients";
$result=mysqli_query($conn,$query);
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);

if(isset($_SESSION['admin']) && $_SESSION['admin']==1){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="../parts/navbar.css">
</head>
<body>
    <br>
    <a href="ajouterclient.php" class="btn btn-success">Ajouter client</a>
    <br>
    <br>


<?php if (isset($_GET['success']) && $_GET['success'] == 'supprimerclient'){ ?>
        <div class="alert alert-success text-center" role="alert">
            Client supprimé avec succès !
        </div>
<?php } ?>
<?php if (isset($_GET['success']) && $_GET['success'] == 'clientajouter'){ ?>
        <div class="alert alert-success text-center" role="alert">
            Client ajouté avec succès !
        </div>
<?php } ?>
<?php if (isset($_GET['success']) && $_GET['success'] == 'modifiedclient'){ ?>
        <div class="alert alert-success text-center" role="alert">
            Client modifié avec succès !
        </div>
<?php } ?>

    <table class="table">
        <thead>
            <tr>
                <th>CIN</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>PHONE</th>
                <th>EMAIL</th>
                <th>ACTIONS</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach($rows as $row){ ?>
            <tr>
                <td><?= $row['cin'] ?></td>
                <td><?= $row['nom_client'] ?></td>
                <td><?= $row['prenom_client'] ?></td>
                <td><?= $row['telephone_client'] ?></td>
                <td><?= $row['email_client'] ?></td>
                <td>
                    <a href="supprimer_client.php?cin=<?= $row['cin'] ?>" class="btn btn-danger" onclick="confirmDeletion(event)">Supprimer</a>
                    <a href="modifier_client.php?cin=<?= $row['cin'] ?>" class="btn btn-success">Modifier</a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>






    <script>
        function confirmDeletion(event) {
            if (!confirm("Êtes-vous sûr de vouloir supprimer ce client ?")) {
                event.preventDefault();
            }
        }
    </script>
</body>
</html>
<?php }else{
    header("location:home.php");
} ?>