<?php include_once '../../config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../../includes/navigation-inc.php';?>

    <?php 
    $command = $db->prepare('SELECT car_make_name, car_model_id, car_model_name, car_model_variant, car_model_price, car_model_power, car_model_mileage, car_model_fuel_type, car_model_fuel_cons, car_model_gearbox, car_model_desc
FROM car_make a INNER JOIN car_model b ON a.car_make_id=b.car_make_id WHERE car_model_id=:car_model_id;');
    $command->execute(array(':car_model_id'=>$_POST['carModelId']));
    
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
    }    
    
    ?>


    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-12 jumbotron py-5 mx-1">

                <?php if(file_exists("../../img/car_model/" . $carModelId . ".jpg")) : ?>
                <img src="<?php echo $appPath . "img/car_model/" . $carModelId . ".jpg ";?>" alt="Car Model" class="w-100" />

                <?php endif; ?>

                <div class="col-md-12">
                    <div class="row justify-content-md-between mt-3">
                        <h3 class="text-left">
                            <?php echo $carMakeName . ' ' . $carModelName . ' ' . $carModelVariant;?>
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

                </div>

            </div>


        </div>

    </div>


    <?php include_once '../../includes/footer-inc.php';?>

    <?php include_once '../../includes/scripts-inc.php';?>
</body>

</html>
