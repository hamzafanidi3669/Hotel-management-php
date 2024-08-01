<?php include '../parts/navbar.php'; ?>
<?php include '../conn.php'; ?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Retrieve the service ID from the URL
$id_service = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the service details from the database
$query = "SELECT * FROM services WHERE id_service = $id_service";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$service = mysqli_fetch_assoc($result);

if (!$service) {
    echo "Service not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $service['nom_service'] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="../parts/navbar.css">
    <link rel="stylesheet" href="css/services.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
        .service-details {
            margin: 50px 120px;
        }
        .serviceh1 {
            display: flex;
            justify-content: center;
        }
        .servicedescription, .serviceprix, .servicecommander {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }
        .serviceprix p {
            font-weight: 600;
        }
        .commanderservice, .supprimerservice,.updateservice {
            text-decoration: none;
            border: 2px solid #DC5F00;
            background: #DC5F00;
            padding: 10px;
            border-radius: 4px;
            color: #EEEE;
            font-weight: 700;
            font-size: 24px;
        }
        .commanderservice:hover, .supprimerservice:hover,.updateservice:hover{
            transform: scale(1.07);
            transition: .3s;
            color: white;
            text-decoration: none;
        }
        .supprimerservice {
            border-color: red;
            background: red;
        }
        
    </style>
    <script>
        function confirmDeletion(event) {
            if (!confirm("Êtes-vous sûr de vouloir supprimer ce service ?")) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <div class="service-details">

        <div class="serviceh1">
            <h1><?= $service['nom_service'] ?></h1>
        </div>
        <div class="serviceimg row">
            <img class="col-12" src="<?= $service['image_service'] ?>" alt="<?= $service['nom_service'] ?>">
        </div> <br> <br>
        <div class="descriptiontitre">
            <h2>Description:</h2>
        </div>
        <div class="servicedescription">
            <p><?= $service['description_service'] ?></p>
        </div>
        <div class="serviceprix">
            <p><?= $service['prix_service'] ?> DHS</p>
        </div>

        <!-- message apres supression: -->
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div class="alert alert-success text-center" role="alert">
                Service supprimé avec succès !
            </div>
        <?php endif; ?>


        <form action="commander.php" method="POST" class="col-12">
            <input type="hidden" name="service_id" value="<?= $service['id_service'] ?>">
            <div class="form-group row justify-content-center">

            <!-- ila kant session 3amra dnc shi wahd dayr login: -->
            <?php if(isset($_SESSION['admin'])) { ?>
                <!-- ila makansh admin affichi lih bash ykhtar lquantite: -->
                <?php if(($_SESSION['admin']) == 0) { ?>
                <div class="col-4">
                    <input type="number" min="1" max="10" name="quantite_service" class="form-control" placeholder="Quantité" required value="1">
                </div>
                <?php } ?>
            <!--ila makansh dayr login donc visiteur:  -->
            <?php }else{ ?>
                <div class="col-4">
                    <input type="number" min="1" max="10" name="quantite_service" class="form-control" placeholder="Quantité" value="1">
                </div>
            <?php } ?>

            </div>
            <input type="hidden" name="prix_service" value="<?= $service['prix_service'] ?>">
            <div class="form-group row justify-content-center">
                <div class="col-4 text-center">

                 
                <?php if(isset($_SESSION['admin'])) { ?>
                    <?php if(($_SESSION['admin']) == 1) { ?>

                        <a class="supprimerservice" href="supprimerservice.php?id=<?= $service['id_service'] ?>" onclick="confirmDeletion(event)">Supprimer</a>
                        <a class="updateservice" href="update_form_service.php?id=<?= $service['id_service'] ?>">Update</a>
                    <?php } else { ?>
    
                        <button type="submit" class="btn commanderservice">Commander</button>
                        
                    <?php } ?>
                <?php }else{ ?>
                    <button type="submit" class="btn commanderservice">Commander</button>
                <?php } ?>

                </div>
            </div>
        </form>
    </div>
</body>
</html>
