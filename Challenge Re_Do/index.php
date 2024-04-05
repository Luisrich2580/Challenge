<?php include("Assets/header.php"); ?>

<body>
    <div class="header">
        <h1 class="text-center bg-dark text-warning p-5">Contact</h1>
    </div>

    <div class="container mt-5">
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" class="form-control" name='first_Name' required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Last Name</label>
                <input type="text" name='last_Name' class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" name='email' class="form-control" required>
            </div>
            <input type="submit" class="btn btn-success" name="submit" value="Sign Up" required>
        </form>

        <?php
        if (isset($_GET['msg1'])) {
            echo "<h6>" . $_GET['msg'] . "</h6>";
        }
        ?>
        <table class="table table-hover table-bordered table-striped mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

    </div>


    <?php

    if (isset($_POST["submit"])) {
        $First_name = $_POST["first_Name"];
        $Last_name = $_POST["last_Name"];
        $Email = $_POST["email"];

        $query = "INSERT INTO `contacts`(`first_name`, `last_name`, `email`) VALUES ('$First_name', '$Last_name', '$Email')";
        $results = mysqli_query($conn, $query);

        if (!$results) {
            die("Failed To Update");
        } else {
            header("location:index.php?msg1 = Contact added");
        }
    }

    $result = "SELECT * FROM `contacts`";
    $list = mysqli_query($conn, $result);;

    if (!$list) {
        die("Failed To Fetch");
    } else {
        while ($row = mysqli_fetch_assoc($list)) {
            // $id = $row['id'];
    ?>

            <tr>
                <th><?php echo $row['id'] ?></th>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td class="gap-3">
                    <a href="Assets/Edit.php?id=<?php echo $row['id'] ?>" class="btn btn-success" name="edit" value="Edit">Edit
                <a href="Assets/delete.php?id_delete=<?php echo $row['id'] ?>" class="btn btn-danger ms-1" name="edit" value="Delete">Delete</td>

            </tr>


    <?php
        }
    }
    ?>
    </tbody>
    </table>
    <!-- php insert ends here -->


    <?php include("Assets/footer.php"); ?>