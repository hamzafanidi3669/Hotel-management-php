<?php
session_start();
include '../conn.php' ;

if(isset($_POST['email']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);#katsupprimi lk les espaces
        $data = stripslashes($data);#kat7yd lk slashes
        $data = htmlspecialchars($data);#bash mytktbsh code html fl input
        return $data;
    }
    $email=validate($_POST['email']);
    $pass=validate($_POST['password']);
    // $email=$_POST['email'];
    // $pass=$_POST['password'];

    if(empty($email)){
        header("Location:form_login.php?error=Email is required");
        exit();
    }else if(empty($pass)){
        header("Location:form_login.php?error=password is required");
        exit();
    }else{
        $query="SELECT * from clients where email_client='$email' and mot_de_passe_client='$pass'";
        $result=mysqli_query($conn,$query);
        
        if(mysqli_num_rows($result)===1){
            $row=mysqli_fetch_assoc($result);
            #meme si l email et le password correct il peut pas entrer cette if :
            if($row['email_client']===$email && $row['mot_de_passe_client']===$pass){
            // if (password_verify($pass, $row['mot_de_passe'])) {
                $_SESSION['cin']=$row['cin'];
                $_SESSION['nom']=$row['nom_client'];
                $_SESSION['adresse']=$row['adresse_client'];
                $_SESSION['prenom']=$row['prenom_client'];
                $_SESSION['telephone']=$row['telephone_client'];
                $_SESSION['admin']=$row['admin'];
                $_SESSION['email']=$row['email_client'];
                $_SESSION['pass']=$row['mot_de_passe_client'];

                header("Location:home.php");
                exit();
            }else{
                header("Location:form_login.php?error=Incorect Email or password");
                

            }

        }else{
            header("Location:form_login.php?error=Incorrect email or password");
            exit();
        }
    }
    
}else{
    header("Location:index.php");
    exit();
}






?>