<?php include_once '../../config.php'; checkLogin(); checkRole('Admin'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../../includes/navigation-inc.php';?>

        <div class="container mt-5">

            <div class="col-md-12 jumbotron">

                <h3 class="mb-4 text-center">Add car feature</h3>

                <!-- Add car feature form -->
                <form action="adding_car_feature.php" method="post" >
                    <div class="row justify-content-center">

                        <!-- Car model name -->
                        <div class="col-md-10 mb-2">
                            <input class="form-control" type="text" name="carFeatureName" id="carFeatureName" placeholder="Enter car feature name *" />
                        </div>
                        
                    </div>

                    <div class="row justify-content-center mt-2 mt-md-4">

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block">Add feature</button>
                        </div>

                        <div class="col-md-4 mt-2 mt-md-0">
                            <a href="car_feature.php" type="button" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                    </div>

                </form>

            </div>

        </div>


        <?php include_once '../../includes/footer-inc.php';?>

        <?php include_once '../../includes/scripts-inc.php';?>
</body>

</html>
