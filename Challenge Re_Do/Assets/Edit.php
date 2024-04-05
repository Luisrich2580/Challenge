<div class="header">
    <h1 class="text-center bg-dark text-warning p-5 mb-5">Edit Contacts</h1>
</div>
<?php
    include("./header.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $sql = "SELECT * FROM `contacts` WHERE `id` = '$id'";
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        die("Failed to Edit");
    } else {
        $row = mysqli_fetch_assoc($res);
    }

?>

<div class="container">
    <form action="Edit.php?new_id=<?php echo $row['id'] ?>" method="POST">
        <div class="mb-3"> 
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" class="form-control" name='firstName' value="<?php echo $row['first_name'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Last Name</label>
            <input type="text" name='lastname' class="form-control" value="<?php echo $row['last_name'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" name='email' class="form-control" value="<?php echo $row['email'] ?>" required>
        </div>
        <input type="submit" class="btn btn-success" name="update" value="Change">
    </form>
</div>

<?php

if(isset($_POST['update'])){

    if (isset($_GET['new_id'])) {
        $newid = $_GET['new_id'];
    }

    $f_name = $_POST['firstName'];
    $l_name = $_POST['lastname'];
    $email = $_POST['email'];



    $update = "UPDATE `contacts` SET `first_name`='$f_name',`last_name`='$l_name',`email`='$email' WHERE `id` = '$newid'";
    $result = mysqli_query($conn, $update);

    if(!$result){
        die("Could Not Update Anything");
    }
    else{
        header("location:../index.php?smg = You Edited The Contact");
    }

}

include("./footer.php");


?>