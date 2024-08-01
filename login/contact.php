<?php include '../parts/navbar.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="../parts/navbar.css">
    <style>
        .containercontact {
            margin: 50px auto;
            max-width: 600px;
            text-align: center;
        }
        .contacttitre {
            margin-bottom: 20px;
        }
        .contactwhatsapp, .contactemail {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            margin: 10px auto;
            border-radius: 20px;
            background-color: #e5e5ea;
            max-width: 75%;
            word-wrap: break-word;
            position: relative;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .contactwhatsapp img, .contactemail img {
            width: 40px;
            height: 40px;
            position: relative;
            left:450px;
            border-radius: 50%;
            /* margin-right: 10px; */
        }
        .contactwhatsapp::after, .contactemail::after {
            content: '';
            position: absolute;
            width: 0;
            height: 0;
            border: 15px solid transparent;
            top: 10px;
            right: -30px;
        }
        .contactwhatsapp {
            background-color: #DC5F00;
        }
        .contactwhatsapp::after {
            border-left-color: #DC5F00;
        }
        .contactemail {
            background-color: #DC5F00;
            color: black;
        }
        .contactemail::after {
            border-left-color: #DC5F00;
        }
    </style>
</head>
<body>
    <div class="containercontact">
        <div class="contacttitre">
            <h1>Contactez-moi sur:</h1>
        </div>
        <div class="contactwhatsapp">
            <img src="../parts/image/photo_contact.jpeg" alt="Photo WhatsApp">
            <p>+212 630 279 686</p>
        </div>
        <div class="contactemail">
            <img src="../parts/image/photo_contact.jpeg" alt="Photo Email">
            <p>hamzafanidi64@gmail.com</p>
        </div>
        <div class="contactemail">
            <img src="../parts/image/photo_contact.jpeg" alt="Photo Email">
            <p>hamza.fanidi.lpu24@ensem.ac.ma</p>
        </div>
 
    </div>
</body>
</html>
