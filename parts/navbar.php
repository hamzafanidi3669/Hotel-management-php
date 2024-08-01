<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        nav h2{
            font-family: 'Poppins',sans-serif !important;
        }
        .fanidihotelnav{
            text-decoration:none;
            color:#DC5F00;
        }
        .fanidihotelnav:hover{
            text-decoration:none;
            color:#DC5F00;
            transform:scale(1.05);
            font-weight:900;
            transition:.4s;

        }
    </style>
</head>
<body>
    <div class="hero">
        <nav>
            <a class="fanidihotelnav" href="home.php">
                <h2>FANIDI HOTEL</h2>
            </a>
            <ul>
            <li>
                    <a href="../login/home.php" class="<?= basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active' : '' ?>">Home</a>
                </li>
                <li>
                    <a href="../login/services.php" class="<?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : '' ?>">Services</a>
                </li>
                <li>
                    <a href="../login/about.php" class="<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>">About</a>
                </li>
                <!-- premierement anverifiw d'abord l user wash dayr login ,3aad apres nverifiw wash dik session admin true (1) , si on a pas testé d abord wash l user dayr login ghadi ytla3 erreur  -->
                <?php if(isset($_SESSION['email'])){ ?>
                    <!-- anverifiw wash dak l user lli dayr login admin ola la -->
                    <?php if(($_SESSION['admin'] == 1)){ ?>
                        <li>
                            <a href="../login/client_info.php" class="<?= basename($_SERVER['PHP_SELF']) == 'client_info.php' ? 'active' : '' ?>">Client info</a>
                        </li>   
                    <!-- si le user est un utilisateur normal wmashi admin:  -->
                    <?php }else{ ?>
                        <li>
                    <a href="../login/contact.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : '' ?>">Contact</a>
                </li>
                    <?php }?>
                <!-- si le user madayrsh le login donc gha visiteur -->
                <?php }else{?>

                    <li>
                        <a href="../login/contact.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : '' ?>">Contact</a>
                    </li>
                <?php } ?>

            
            </ul>
            <?php 
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if(empty($_SESSION['email']) && empty($_SESSION['pass']) ){
            ?>
                
                <a class="navconnexion" href="../login/form_login.php">Connexion</a>

            <?php }else{ ?>
            
                <a class="navconnexion" href="../login/logout.php">Deconnexion</a>
            <?php } ?>
        
        </nav>
    </div>
    
</body>
</html>