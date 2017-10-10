<?php include_once '../config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../includes/navigation-inc.php';?>

    <div class="container mt-5">

        <div class="col-md-12 jumbotron">
            
            <h3 class="mb-3 text-center">Add Car Make</h3>
            
            <!-- Add car form -->
            <form action="adding_car_make.php" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-4 mb-2">
                        <label class="custom-file">
                            <input type="file" name="file2" id="file2" class="custom-file-input">
                            <span class="custom-file-control"></span>
                        </label>
                    </div>


                    <!-- Vehicle model input -->
                    <div class="col-md-4 mb-2">
                        <input class="form-control" type="text" name="carMakeName" id="carMakeName" placeholder="Enter car make name" />
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block">Add car</button>
                    </div>

                </div>

            </form>

        </div>

    </div>


    <?php include_once '../includes/footer-inc.php';?>

    <?php include_once '../includes/scripts-inc.php';?>
</body>

</html>
