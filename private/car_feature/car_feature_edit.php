<?php include_once '../../config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../../includes/navigation-inc.php';?>

    <?php
    $carFeatureId = $_GET['carFeatureId'];
    $command = $db->prepare('SELECT car_feature_name FROM car_feature WHERE car_feature_id=:car_feature_id;');
    $command->execute(array(':car_feature_id'=>$carFeatureId));
    
    while($row = $command->fetch(PDO::FETCH_ASSOC)) {
        $carFeatureName = $row['car_feature_name'];
    }
    
    ?>


        <div class="container mt-5">

            <div class="col-md-12 jumbotron">

                <h3 class="mb-4 text-center">Edit Car Feature</h3>

                <!-- Add car form -->
                <form action="editing_car_feature.php" method="post" >
                    <div class="row justify-content-center">
                       
                        <!-- Car feature name -->
                        <div class="col-md-10 mb-2">
                            <input class="form-control" type="text" name="carFeatureName" id="carFeatureName" placeholder="Enter car feature name *" value="<?php echo $carFeatureName;?>"/>
                        </div>
                        
                    </div>

                    <div class="row justify-content-center mt-2 mt-md-4">
                       
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block">Edit feature</button>
                        </div>

                        <div class="col-md-4 mt-2 mt-md-0">
                            <a href="car_feature.php" type="button" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                    </div>

                    <!-- Car feature id -->
                    <div class="col-md-4 mb-2">
                        <input class="form-control" type="hidden" name="carFeatureId" id="carFeatureId" value="<?php echo $carFeatureId;?>" />
                    </div>
               
                </form>

            </div>

        </div>


        <?php include_once '../../includes/footer-inc.php';?>

        <?php include_once '../../includes/scripts-inc.php';?>
</body>

</html>
