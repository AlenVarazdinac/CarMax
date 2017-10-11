<?php include_once '../../config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../../includes/navigation-inc.php';?>

    <div class="container mt-5">

        <div class="col-md-12 jumbotron">
            
            <h3 class="mb-4 text-center">Add Car Make</h3>
            
            <!-- Add car form -->
            <form action="adding_car_make.php" method="post" enctype="multipart/form-data">
                <div class="row justify-content-center">

                    <div class="col-md-6 mb-2">
                        <label class="custom-file col-md-12">
                            <input type="file" name="file2" id="file2" class="custom-file-input">
                            <span class="custom-file-control"></span>
                        </label>
                    </div>


                    <!-- Vehicle model input -->
                    <div class="col-md-6 mb-2">
                        <input class="form-control" type="text" name="carMakeName" id="carMakeName" placeholder="Enter car make name" />
                    </div>
                </div>
                
                <div class="row justify-content-center mt-2 mt-md-4">
                   
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block">Add car</button>
                    </div>
                    
                    <div class="col-md-4 mt-2 mt-md-0">
                        <a href="car_make.php" type="button" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                </div>

            </form>

        </div>

    </div>


    <?php include_once '../../includes/footer-inc.php';?>

    <?php include_once '../../includes/scripts-inc.php';?>
</body>

</html>
