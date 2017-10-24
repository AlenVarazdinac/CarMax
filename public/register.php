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
           
            <div class="col-md-12 my-2">
                <h2 class="text-center">Register</h2>
            </div>
            
            <div class="col-md-9 m-md-2">
                <form action="../registration.php" method="post">

                    <!-- Username Field -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter e-mail">
                    </div>
                       
                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                    </div>

                    <!-- Warning text -->
                    <p class="text-center text-danger">
                        <?php
                            if(isset($_GET["notset"])) {
                                echo "All fields must be filled!";
                            }
                        ?>
                    </p>
                    <!-- Success text -->
                    <p class="text-center text-success">
                        <?php
                            if(isset($_GET["registered"])) {
                                echo "Successfully registered!";
                            }
                        ?>
                    </p>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-block mt-2">Register</button>
                    </div>

                </form>
            </div>
            
        </div>
        
    </div>

    <?php include_once '../includes/footer-inc.php';?>

    <?php include_once '../includes/scripts-inc.php';?>
</body>

</html>
