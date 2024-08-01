<?php include '../parts/navbar.php'?>
<?php
if (session_status() == PHP_SESSION_NONE) { #bash maytrash lina dk l error notice
    session_start();
}
// session_start(); 
if(empty($_SESSION['email']) && empty($_SESSION['pass']) ){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Ludiflex</title>
    <link rel="stylesheet" href="../parts/navbar.css">
    <link rel="stylesheet" href="css/style_form_login.css">
</head>
<body>
    <div class="containerr">
        <form action="login.php" method="post" class="login-box">
            <div class="login-header">
                <header>Login</header>
            </div>
            <?php if(isset($_GET['error'])) { ?>
            
            <p class="error">
                <?php echo $_GET['error'];?> 
            </p>
            
            <?php } ?>
            <div class="input-box">
                <input type="text" name='email' class="input-field" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name='password' class="input-field" placeholder="Password" autocomplete="off" required>
            </div>
            
            <div class="input-submit">
                <button class="submit-btn" id="submit"></button>
                <label for="submit">Sign In</label>
            </div>
            <div class="sign-up-link">
                <p>Don't have account? <a href="signup.php">Sign Up</a></p>
            </div>
        </form>
    </div>
</body>
</html>
<?php }else{
    header("Location:home.php")
    
    ?>

    <?php } ?>
