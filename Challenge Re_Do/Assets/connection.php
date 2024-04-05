<?php
    $conn = new mysqli("localhost", "root", "", "contact_db");

    if(!$conn){
        die("Failed to connect");
    }
    else{
        // echo "Succesiful Connected";
    }
?>