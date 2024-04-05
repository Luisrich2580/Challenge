<?php
    include("header.php");
    if(isset($_GET['id_delete'])){
        $id = $_GET['id_delete'];
    }

    $sql = "DELETE FROM `contacts` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if(!$result){
        die("Failed To Conect");
    }
    else{
        header("location:../index.php?msg = You Deleted The Contact");
    }
?>

    


<?php include("footer.php"); ?>