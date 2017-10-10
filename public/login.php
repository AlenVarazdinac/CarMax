<?php include_once '../config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../includes/navigation-inc.php';?>

    <!-- Login Form -->
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center jumbotron">
            <div class="col-md-9 m-md-2">
                <form action="../authorize.php" method="post">

                    <!-- Username Field -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                    </div>

                    <!-- Warning text -->
                    <p class="text-center text-danger">
                        <?php
                                if(isset($_GET["norights"])) {
                                    echo "Please login!";
                                }
                                if(isset($_GET["wrong"])) {
                                    echo "Wrong username or password!";
                                }
                            ?>
                    </p>
                    <!-- Success text -->
                    <p class="text-center text-success">
                        <?php
                                if(isset($_GET["loggedout"])) {
                                    echo "Successfully logged out!";
                                }
                            ?>
                    </p>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-block mt-2">Log in</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <?php include_once '../includes/footer-inc.php';?>

    <?php include_once '../includes/scripts-inc.php';?>
</body>

</html>
