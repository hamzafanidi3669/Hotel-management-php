<?php
$local="localhost";
$user='root';
$password='';

$db='gestion_hotel';

$conn=mysqli_connect($local,$user,$password,$db);

if(!$conn){
    echo 'connexion failed!';
}




?>