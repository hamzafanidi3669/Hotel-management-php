<?php include '../parts/navbar.php' ?>
<?php include '../conn.php' ?>

<?php 
// session_start();
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

$query = "SELECT * FROM services";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


$servicesPerPage = 18;
$totalServices = count($rows); #bash n3rf sh7al mn service 3nde
$totalPages = ceil($totalServices / $servicesPerPage); # an9sm sh7al mn service 3de 3la sh7al ana baghe fpage


$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;#ila kan le mot page f lurl converti lya lavaleur dyalo l int  , ila makantsh kelma dpage donc rahna fla page lowla wghadi n3tewha par defaut 1
$startIndex = ($current_page - 1) * $servicesPerPage;#bash n3ref bash anbda 7tash maymknsh ana flpage 2 wghanbda mn service lowl , ila kna flpage 3 : 3-1=2*18 =36 donc anbdaw men 37 flpage 3 


$current_services = array_slice($rows, $startIndex, $servicesPerPage);
#$rows tableau complet lli feh ga3 les services , wkan3teh startindex mnash ghadi ybda lli deja 7sbnah,wkan3teh sh7al mn service baghe yt afficha lya flpage+ had lvariable howa lli ander 3lih lboucle 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="../parts/navbar.css">
    <!-- <link rel="stylesheet" href="css/services.css"> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
        .text-center {
            text-align: center;
            margin-top: 20px;
        }
        .ajouterservice{
            text-decoration: none;
            border:2px solid #DC5F00 ;
            background:#DC5F00;
            padding: 10px;
            border-radius:4px;
            color:#EEEE;
            font-weight:700;
            font-size:24px;
            margin:50px;
        }
        .ajouterservice:hover{
            transform:scale(1.1);
            transition:.3s;
            color: white;
            text-decoration:none;

        }
        
    </style>
</head>
<body>
    <br>
<?php if(isset($_SESSION['email'])){ ?>
    <?php if(($_SESSION['admin'] == 1)){ ?>
        <a href="ajouterservice.php" class="ajouterservice">AjouterService</a>
    <?php } ?>
 <?php } ?>

 <?php if (isset($_GET['success']) && $_GET['success'] == 'supprimerservice'){ ?>
        <div class="alert alert-success text-center" role="alert">
            Service supprimé avec succès !
        </div>
<?php }if(isset($_GET['success']) && $_GET['success']=='updateservice'){ ?>
    <div class="alert alert-success text-center" role="alert">
            Updated service successfully !
        </div>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success']=='achatcommande'){ ?>
    <div class="alert alert-success text-center" role="alert">
            Service reservé avec succés!
        </div>
<?php } ?>


    <div class="homeservices">
        <div class="homesterlowl row">
            <?php foreach ($current_services as $row) { ?>
                <a href="service.php?id=<?= $row['id_service'] ?>" class="homedivlowl row-4">
                    <div class="homedivimg">
                        <img src="<?= $row['image_service'] ?>" alt="">
                    </div>
                    <div class="homedivtxt">
                        <span><?= $row['nom_service'] ?></span>
                    </div>    
                </a>
            <?php } ?>
        </div>

        <div class="text-center">
            <!-- imta aytl3 lya page precedente , 7ta ghde tkun lpage lli feha ana kber men 1  -->
            <?php if ($current_page > 1) { ?>
                <a href="?page=<?= $current_page - 1 ?>" class="btn btn-primary">Page précédente</a>
            <?php } ?>
            <?php if ($current_page < $totalPages) { ?>
                <a href="?page=<?= $current_page + 1 ?>" class="btn btn-primary">Page suivante</a>
            <?php } ?>
        </div>
    </div>

</body>
</html>
