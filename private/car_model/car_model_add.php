<?php include_once '../../config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../../includes/navigation-inc.php';?>

    <?php
    $command = $db->prepare('SELECT car_make_id, car_make_name FROM car_make;');
    $command->execute();
    $result = $command->fetchAll(PDO::FETCH_OBJ);    
    ?>

    
        <div class="container mt-5">

            <div class="col-md-12 jumbotron">

                <h3 class="mb-4 text-center">Add Car Model</h3>

                <!-- Add car form -->
                <form action="adding_car_model.php" method="post" enctype="multipart/form-data">
                    <div class="row justify-content-center">

                        <!-- Car make select -->
                        <div class="form-group col-md-4 mb-2">
                            <select class="form-control" name="carMakeName" id="carMakeName">
                                <option value="">Select car make *</option>
                                <?php foreach ($result as $carMake): ?>
                                    <option value="<?php echo $carMake->car_make_id;?>"><?php echo $carMake->car_make_name;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <!-- Car model name -->
                        <div class="col-md-4 mb-2">
                            <input class="form-control" type="text" name="carModelName" id="carModelName" placeholder="Enter car model name *" />
                        </div>

                        <!-- Car model variant name -->
                        <div class="col-md-4 mb-2">
                            <input class="form-control" type="text" name="carVariantName" id="carVariantName" placeholder="Enter car variant name" />
                        </div>
                        
                    </div>
                    
                    <div class="row justify-content-center">
                        <!-- Car power -->
                        <div class="col-md-4 mb-2 input-group">
                            <input class="form-control" type="number" name="carModelPower" id="carModelPower" placeholder="Enter car model power *" min=0 step=1 />
                            <div class="input-group-addon">HP</div>
                        </div>
                        
                        <!-- Car mileage -->
                        <div class="col-md-4 mb-2 input-group">
                            <input class="form-control" type="number" name="carModelMileage" id="carModelMileage" placeholder="Enter car model mileage *" step=1 min=0 />
                            <div class="input-group-addon">km</div>
                        </div>
                        
                        <!-- Car gearbox -->
                        <div class="form-group col-md-4 mb-2">
                            <select class="form-control" name="carModelGearbox" id="carModelGearbox">
                            <option value="">Select gearbox *</option>
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row justify-content-center">
                        <!-- Fuel Type -->
                        <div class="col-md-6 mb-2">
                            <select class="form-control" name="carModelFuelType" id="carModelFuelType">
                            <option value="">Select fuel type *</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            </select>
                        </div>
                        
                        <!-- Fuel Consumption -->
                        <div class="col-md-6 mb-2 input-group">
                            <input class="form-control" type="number" name="carModelFuelCons" id="carModelFuelCons" placeholder="Enter car fuel consumption" step=0.10 min=0 />
                            <div class="input-group-addon">l/100km</div>
                        </div>
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-md-12 mb-2">
                            <textarea class="form-control" placeholder="Enter model description" rows="2" name="carModelDesc" id="carModelDesc"></textarea>    
                        </div>
                    </div>
                    
                    <div class="row justify-content-center">
                        <!-- Model price -->
                        <div class="col-md-5 mb-2 input-group">
                            <div class="input-group-addon">$</div>
                            <input class="form-control" type="number" name="carModelPrice" id="carModelPrice" placeholder="Enter car price *" step=0.01 min=0 />
                        </div>
                        
                        <!-- Model image -->
                        <div class="col-md-5 mb-2">
                            <label class="custom-file col-md-12">
                            <input type="file" name="file2" id="file2" class="custom-file-input">
                            <span class="custom-file-control">Car model image</span>
                        </label>
                        </div>
                    </div>
                    
                    <!-- Car features -->
                    <?php
                    $command = $db->query('SELECT car_feature_id, car_feature_name FROM car_feature;');
                    $result = $command->fetchAll(PDO::FETCH_OBJ);
                    ?>

                    <div class="row d-flex justify-content-center mt-2 align-items-center">
                    <?php foreach($result as $carFeature): ?>
                    <div class="col-md-2">
                        <label for="carFeature<?php echo $carFeature->car_feature_name; ?>"><?php echo $carFeature->car_feature_name; ?></label>
                        <input type="checkbox" name="carFeature[]" id="carFeature<?php echo $carFeature->car_feature_name; ?>" value="<?php echo $carFeature->car_feature_id; ?>" />
                    </div>
                    <?php endforeach; ?>    
                    </div>
                    
                    <!-- Buttons -->
                    <div class="row justify-content-center mt-2 mt-md-4">

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block">Add model</button>
                        </div>

                        <div class="col-md-4 mt-2 mt-md-0">
                            <a href="car_model.php" type="button" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                    </div>

                </form>

            </div>

        </div>


        <?php include_once '../../includes/footer-inc.php';?>

        <?php include_once '../../includes/scripts-inc.php';?>
</body>

</html>
