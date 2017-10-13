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
FROM car_make a INNER JOIN car_model b ON a.car_make_id=b.car_make_id;');
    $command->execute();
    $result = $command->fetchAll(PDO::FETCH_OBJ);
    ?>


    <div class="container mt-5">

        <div class="row justify-content-center">

            <!-- Add button for car make -->
            <div class="col-md-10 jumbotron mx-2">
                <i class="fa fa-plus-circle fa-5x d-flex justify-content-center mb-3" aria-hidden="true"></i>
                <a href="car_model_add.php" class="btn btn-primary d-flex justify-content-center mb-0">Add</a>
            </div>
        </div>


        <div class="row justify-content-center">
            <!-- Show all car makes -->
            <?php foreach($result as $carModel): ?>

            <div class="col-md-5 jumbotron py-5 mx-1">
                <div class="col-md-12">
                    <div class="row justify-content-md-between">
                        <p class="text-left">
                            <?php echo $carModel->car_make_name . ' ' . $carModel->car_model_name . ' ' . $carModel->car_model_variant;?>
                        </p>

                        <p class="text-right">
                            $
                            <?php echo $carModel->car_model_price;?>
                        </p>
                    </div>
                </div>




                <?php if(file_exists("../../img/car_model/" . $carModel->car_model_id . ".jpg")) : ?>
                <img src="<?php echo $appPath . " img/car_model/ " . $carModel->car_model_id . ".jpg ";?>" alt="Car Model" class="w-100" />

                <?php endif; ?>
                <a href="#" class="btn btn-primary d-flex justify-content-center mb-0">Show</a>

                <form action="car_model_edit.php" method="get">

                    <button class="btn btn-dark d-flex justify-content-center mb-2 mt-2 col-md-12">Edit</button>
                    <input type="hidden" name="carMakeId" id="carModelId" value="<?php echo $carModel->car_model_id;?>" />

                </form>

                <a href="removing_car_model.php?car_model_id=<?php echo $carModel->car_model_id;?>" class="btn btn-danger d-flex justify-content-center mb-0">Remove</a>

            </div>

            <?php endforeach; ?>

        </div>





    </div>


    <?php include_once '../../includes/footer-inc.php';?>

    <?php include_once '../../includes/scripts-inc.php';?>
</body>

</html>
