<?php include_once '../../config.php'; checkLogin(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../../includes/navigation-inc.php';?>

    <?php 
        $command = $db->prepare('SELECT a.car_make_name, b.car_model_id, b.car_model_name, b.car_model_variant, b.car_model_price, b.car_model_power, b.car_model_power, b.car_model_mileage, b.car_model_fuel_type, b.car_model_fuel_cons, b.car_model_gearbox, b.car_model_gearbox, b.car_model_desc, d.car_feature_name
        FROM car_make a 
        INNER JOIN car_model b ON a.car_make_id=b.car_make_id
        LEFT JOIN model_feature c ON b.car_model_id=c.model_id
        LEFT JOIN car_feature d ON c.feature_id=d.car_feature_id
        WHERE b.car_model_id=:car_model_id;');
        $command->execute(array(':car_model_id'=>$_GET['carModelId']));
        
        while ($row = $command->fetch(PDO::FETCH_ASSOC)) {
            $carMakeName = $row['car_make_name'];
            $carModelId = $row['car_model_id'];
            $carModelName = $row['car_model_name'];
            $carModelVariant = $row['car_model_variant'];
            $carModelPrice = $row['car_model_price'];
            $carModelPower = $row['car_model_power'];
            $carModelMileage = $row['car_model_mileage'];
            $carModelFuelType = $row['car_model_fuel_type'];
            $carModelFuelCons = $row['car_model_fuel_cons'];
            $carModelGearbox = $row['car_model_gearbox'];
            $carModelDesc = $row['car_model_desc'];
            $carModelFeature = $row['car_feature_name'];
    }    
    
    ?>

    
    <?php 
        $command = $db->prepare('SELECT a.car_make_name, b.car_model_id, b.car_model_name, b.car_model_variant, b.car_model_price, b.car_model_power, b.car_model_power, b.car_model_mileage, b.car_model_fuel_type, b.car_model_fuel_cons, b.car_model_gearbox, b.car_model_gearbox, b.car_model_desc, d.car_feature_name
        FROM car_make a 
        INNER JOIN car_model b ON a.car_make_id=b.car_make_id
        INNER JOIN model_feature c ON b.car_model_id=c.model_id
        LEFT JOIN car_feature d ON c.feature_id=d.car_feature_id
        WHERE b.car_model_id=:car_model_id;');
        $command->execute(array(':car_model_id'=>$_GET['carModelId']));
        $result = $command->fetchAll(PDO::FETCH_OBJ); 
    ?>


        <div class="container mt-5">

            <div class="row justify-content-center">

                <div class="col-md-12 jumbotron py-5 mx-1">

                    <?php if(file_exists("../../img/car_model/" . $carModelId . ".jpg")) : ?>
                    <img src="<?php echo $appPath . "img/car_model/" . $carModelId . ".jpg ";?>" alt="Car Model" class="w-100" />

                    <?php endif; ?>

                    <div class="col-md-12">
                        <div class="row justify-content-md-between justify-content-center mt-3 d-flex align-items-center">
                            <h3 class="text-left">
                                <?php echo $carMakeName . ' ' . $carModelName . ' ' . $carModelVariant;?> &nbsp;
                            </h3>

                            <h4 class="text-right">
                                $
                                <?php echo $carModelPrice;?>
                            </h4>
                        </div>

                        <!-- Car mileage -->
                        <div class="row justify-content-md-center d-flex align-items-center mt-4">
                            <h6 class="text-left">Mileage &nbsp;</h6>
                            <h5 class="text-right">
                                <?php echo $carModelMileage;?> km</h5>
                        </div>

                        <!-- Car power -->
                        <div class="row justify-content-md-center d-flex align-items-center mt-2">
                            <h6 class="text-left">Power &nbsp;</h6>
                            <h5 class="text-right">
                                <?php echo $carModelPower;?> HP</h5>
                        </div>

                        <!-- Car fuel type -->
                        <div class="row justify-content-md-center d-flex align-items-center mt-2">
                            <h6 class="text-left">Fuel type &nbsp;</h6>
                            <h5 class="text-right">
                                <?php echo $carModelFuelType;?>
                            </h5>
                        </div>

                        <!-- Car fuel consumption -->
                        <div class="row justify-content-md-center d-flex align-items-center mt-2">
                            <h6 class="text-left">Fuel consumption &nbsp;</h6>
                            <h5 class="text-right">
                                <?php echo $carModelFuelCons;?> l/100km</h5>
                        </div>

                        <!-- Car gearbox -->
                        <div class="row justify-content-md-center d-flex align-items-center mt-2">
                            <h6 class="text-left">Gearbox &nbsp;</h6>
                            <h5 class="text-right">
                                <?php echo $carModelGearbox;?>
                            </h5>
                        </div>

                        <hr />

                        <!-- Car description -->
                        <div class="row justify-content-md-center d-flex align-items-start mt-2">
                            <h6 class="text-center col-md-12">Description &nbsp;</h6>
                            <p class="text-center col-md-8">
                                <?php echo $carModelDesc;?>
                            </p>
                        </div>

                        <hr />

                    </div>

                    <div class="col-md-12 mt-3">
                        <h6 class="text-center">Features</h6>
                            <div class="row justify-content-md-center">
                            <?php foreach ($result as $carFeatures): ?>
                            <p class="text-center mx-2"><i class="fa fa-play mr-1" aria-hidden="true"></i><?php echo $carFeatures->car_feature_name;?>
                            </p>
                            <?php endforeach; ?>   
                            </div>
                        
                    </div>
                    <div class="row justify-content-md-center d-flex align-items-start mt-3">
                        <a href="car_model.php" class="btn btn-danger d-flex justify-content-center mb-0 col-md-3">Back</a>
                    </div>
                </div>


            </div>

        </div>


        <?php include_once '../../includes/footer-inc.php';?>

        <?php include_once '../../includes/scripts-inc.php';?>
</body>

</html>
