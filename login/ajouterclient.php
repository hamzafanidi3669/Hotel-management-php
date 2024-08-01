<?php include '../conn.php' ; ?>



<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["admin"]) && $_SESSION['admin']==1){
    include '../parts/navbar.php';

    if(isset($_POST["submit"])){

    
    // $nom=$_POST['nom'];
    // $prenom=$_POST['prenom'];
    // $cin=$_POST['cin'];
    // $telephone=$_POST['telephone'];
    // $adresse=$_POST['adresse'];
    // $email=$_POST['email'];
    // $password=$_POST['password'];
    extract($_POST);
    // Validate inputs

    if (empty($nom) || empty($prenom) || empty($cin) || empty($telephone) || empty($adresse) || empty($email) || empty($password)) {
        echo "<script> alert('All fields are required.'); window.location.href='signup.php'; </script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Invalid email format.'); window.location.href='signup.php'; </script>";
    } elseif (strlen($password) < 3) {
        echo "<script> alert('Password must be at least 3 characters long.'); window.location.href='signup.php'; </script>";
    } elseif (strlen($nom) < 3) {
        echo "<script> alert('Nom must be at least 3 characters long.'); window.location.href='signup.php'; </script>";
    } elseif (strlen($prenom) < 3) {
        echo "<script> alert('Prenom must be at least 3 characters long.'); window.location.href='signup.php'; </script>";
    } elseif (strlen($cin) < 6) {
        echo "<script> alert('CIN must be at least 6 characters long.'); window.location.href='signup.php'; </script>";
    } elseif (strlen($adresse) < 6) {
        echo "<script> alert('Adresse must be at least 6 characters long.'); window.location.href='signup.php'; </script>";
    } elseif (!preg_match('/^\d{10}$/', $telephone)) {
        echo "<script> alert('Phone number must be exactly 10 digits.'); window.location.href='signup.php'; </script>";
    } else {

    $duplicate_email=mysqli_query($conn,"SELECT * from clients where email_client='$email'") ;
    $duplicate_phone=mysqli_query($conn,"SELECT * from clients where telephone_client='$telephone'") ;

    if(mysqli_num_rows($duplicate_email)>0){
        echo "<script> alert('duplicate field for email or passwod') </script>";
    }
    elseif(mysqli_num_rows($duplicate_phone)>0) {
        echo "<script> alert('duplicate field for phone ') </script>";
    }else{
        // session_start();
        $query="INSERT into clients(nom_client,prenom_client,cin,telephone_client,adresse_client,email_client,mot_de_passe_client) values('$nom','$prenom','$cin','$telephone','$adresse','$email','$password')";
        $result=mysqli_query($conn,$query) or die(mysqli_error($conn)) ;
        //  echo $email;
        

        header("Location:client_info.php?success=clientajouter");


        
    }
}
}



?>

<br> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Client</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../parts/navbar.css">
    <link rel="stylesheet" href="css/style_form_login.css">

</head>
<body>
    <div class="containerr">
        <form action="" method="post" class="login-box">
            <div class="login-header">
                <header>Ajouter Client</header>
            </div>

            <?php if(isset($_GET['error'])) { ?>
            <p class="error">
                <?php echo $_GET['error'];?> 
            </p>
            <?php } ?>
            
            <div class="input-box">
                <input type="text" name='nom' class="input-field" placeholder="nom" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="text" name='prenom' class="input-field" placeholder="prenom" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="text" name='cin' class="input-field" placeholder="cin" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="text" name='telephone' class="input-field" placeholder="telephone" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="text" name='adresse' class="input-field" placeholder="adresse" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="text" name='email' class="input-field" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name='password' class="input-field" placeholder="Password" autocomplete="off" required>
            </div>

            <div class="input-submit">
                <button class="submit-btn" id="submit" name="submit"></button>
                <label for="submit">Ajouter</label>
            </div>
           
        </form>
    </div>

    <br><br>
    <br><br>
    <br><br>
</body>
</html>
<?php }else{
    header("Location:home.php");
} ?>