<?php
    
    //CONNECT TO MYSQL DATABASE USING MYSQLI
    $Connexion = mysqli_connect("localhost","root","","backend");
    if (!$Connexion) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>