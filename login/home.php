<?php include '../parts/navbar.php'?>
<?php include '../conn.php'?>
<?php 
// session_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$query="SELECT * from services limit 6";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);

// if(isset($_SESSION['email']) && isset($_SESSION['pass']) ){
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

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        *{
            font-family: 'Poppins',sans-serif;

        }
        .btnhomeservices{
            display:flex;
            justify-content:center;
        }
        .btnhomeservices a{
            background:#DC5F00;
            color:#EEEE;

        }
    </style>
</head>

<body>
    <div class="containerhome">
        <div class="titledivhome">
            <h1>WELCOME TO FANIDI HAMZA HOTEL</h1>
            <h2 class="titledivhomeh2">Get your room know!</h2>
            
        </div>

      

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>





    <div class="homeservices">
        <div class="h2homeservices">
            <h2>NOS SERVICES</h2>
        </div>
        <div class="homesterlowl row">
            <?php foreach ($rows as $row) {?>
                <a href="service.php?id=<?=$row['id_service']?>" class="homedivlowl row-4">
                    <div class="homedivimg">
                        <img src="<?= $row['image_service'] ?>" alt="">
                    </div>
                    <div class="homedivtxt">
                        <span><?= $row['nom_service'] ?></span>
                    </div>    
                </a>
            <?php } ?>
        </div>
    </div>

    <div class="btnhomeservices">
        <a href="services.php" class="btn">Voir plus</a>
    </div>
    


</body>
</html>





<br>
<br>
<br>