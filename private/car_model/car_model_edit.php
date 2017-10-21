<?php include_once '../../config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../../includes/navigation-inc.php';?>

    <?php
    /*  Request for car features */
    $carModelId = $_GET['carModelId'];
    $command = $db->prepare('SELECT a.car_make_id, a.car_make_name, b.car_model_id, b.car_model_name, b.car_model_variant, b.car_model_price, b.car_model_power, b.car_model_power, b.car_model_mileage, b.car_model_fuel_type, b.car_model_fuel_cons, b.car_model_gearbox, b.car_model_gearbox, b.car_model_desc, d.car_feature_name
        FROM car_make a 
        INNER JOIN car_model b ON a.car_make_id=b.car_make_id
        INNER JOIN model_feature c ON b.car_model_id=c.model_id
        INNER JOIN car_feature d ON c.feature_id=d.car_feature_id
        WHERE b.car_model_id=:car_model_id;');
    $command->execute(array(':car_model_id'=>$carModelId));
    $result = $command->fetchAll(PDO::FETCH_OBJ);
    
    foreach ($result as $carFeature) {
        $carFeatures[] = $carFeature->car_feature_name;
    }
    echo implode(', ', $carFeatures);
    
    /* Request for car model details */
    $carModelId = $_GET['carModelId'];
    $command = $db->prepare('SELECT a.car_make_id, a.car_make_name, b.car_model_id, b.car_model_name, b.car_model_variant, b.car_model_price, b.car_model_power, b.car_model_power, b.car_model_mileage, b.car_model_fuel_type, b.car_model_fuel_cons, b.car_model_gearbox, b.car_model_gearbox, b.car_model_desc, d.car_feature_name
        FROM car_make a 
        INNER JOIN car_model b ON a.car_make_id=b.car_make_id
        INNER JOIN model_feature c ON b.car_model_id=c.model_id
        INNER JOIN car_feature d ON c.feature_id=d.car_feature_id
        WHERE b.car_model_id=:car_model_id;');
    $command->execute(array(':car_model_id'=>$carModelId));
    while($row = $command->fetch(PDO::FETCH_ASSOC)) {
        $carMakeId = $row['car_make_id'];
        $carMakeName = $row['car_make_name'];
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
    
    $carGearbox = array('Manual', 'Automatic');
    $carFuelType = array('Petrol', 'Diesel');
    
    ?>


        <div class="container mt-5">

            <div class="col-md-12 jumbotron">

                <h3 class="mb-4 text-center">Edit Car Model</h3>

                <!-- Add car form -->
                <form action="editing_car_model.php" method="post" enctype="multipart/form-data">
                    <div class="row justify-content-center">
                        
                        
                        <?php 
                        $command = $db->prepare('SELECT * FROM car_make;');
                        $command->execute();
                        $result = $command->fetchAll(PDO::FETCH_OBJ);
                        ?>
                        
                        <!-- Car make select -->
                        <div class="form-group col-md-4 mb-2">
                            <select class="form-control" name="carMakeId" id="carMakeId">
                                <option value="<?php echo $carMakeId;?>"><?php echo $carMakeName;?></option>
                                <?php foreach ($result as $carMake): ?>
                                    <?php if($carMake->car_make_name!=$carMakeName): ?>
                                    <option value="<?php echo $carMake->car_make_id;?>"><?php echo $carMake->car_make_name;?></option>
                                    <?php  else: continue; ?>
                                    <?php  endif; ?>
                                <?php endforeach;?>
                            </select>
                        </div>
                        
                        
                        
                        <!-- Car model name -->
                        <div class="col-md-4 mb-2">
                            <input class="form-control" type="text" name="carModelName" id="carModelName" placeholder="Enter car model name *" 
                            value="<?php echo $carModelName;?>" />
                        </div>

                        <!-- Car model variant name -->
                        <div class="col-md-4 mb-2">
                            <input class="form-control" type="text" name="carVariantName" id="carVariantName" placeholder="Enter car variant name" 
                            value="<?php echo $carModelVariant;?>"/>
                        </div>
                        
                    </div>
                    
                    <div class="row justify-content-center">
                        <!-- Car power -->
                        <div class="col-md-4 mb-2 input-group">
                            <input class="form-control" type="number" name="carModelPower" id="carModelPower" placeholder="Enter car model power *" min=0 step=1 value="<?php echo $carModelPower;?>"/>
                            <div class="input-group-addon">HP</div>
                        </div>
                        
                        <!-- Car mileage -->
                        <div class="col-md-4 mb-2 input-group">
                            <input class="form-control" type="number" name="carModelMileage" id="carModelMileage" placeholder="Enter car model mileage *" step=1 min=0 value="<?php echo $carModelMileage;?>"/>
                            <div class="input-group-addon">km</div>
                        </div>
                        
                        <!-- Car gearbox -->
                        <div class="form-group col-md-4 mb-2">
                            <select class="form-control" name="carModelGearbox" id="carModelGearbox">
                            <option value="<?php echo $carModelGearbox;?>"><?php echo $carModelGearbox;?></option>
                            <?php foreach($carGearbox as $value): ?>
                            <?php if($carModelGearbox !== $value): ?>
                            <option value="<?php echo $value;?>"><?php echo $value;?></option>
                            <?php else: continue;?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row justify-content-center">
                        <!-- Fuel Type -->
                        <div class="col-md-6 mb-2">
                            <select class="form-control" name="carModelFuelType" id="carModelFuelType">
                            <option value="<?php echo $carModelFuelType;?>"><?php echo $carModelFuelType;?></option>
                            <?php foreach($carFuelType as $value): ?>
                            <?php if($carModelFuelType !== $value): ?>
                            <option value="<?php echo $value;?>"><?php echo $value;?></option>
                            <?php else: continue; ?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <!-- Fuel Consumption -->
                        <div class="col-md-6 mb-2 input-group">
                            <input class="form-control" type="number" name="carModelFuelCons" id="carModelFuelCons" placeholder="Enter car fuel consumption" step=0.10 min=0 value="<?php echo $carModelFuelCons; ?>"/>
                            <div class="input-group-addon">l/100km</div>
                        </div>
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-md-12 mb-2">
                            <textarea class="form-control" placeholder="Enter model description" rows="2" name="carModelDesc" id="carModelDesc" value="<?php echo $carModelDesc;?>"></textarea>    
                        </div>
                    </div>
                    
                    <div class="row justify-content-center">
                        <!-- Model price -->
                        <div class="col-md-5 mb-2 input-group">
                            <div class="input-group-addon">$</div>
                            <input class="form-control" type="number" name="carModelPrice" id="carModelPrice" placeholder="Enter car price *" step=0.01 min=0 value="<?php echo $carModelPrice;?>"/>
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
                        <input type="checkbox" name="carFeature[]" id="carFeature<?php echo $carFeature->car_feature_name; ?>" value="<?php echo $carFeature->car_feature_id; ?>" 
                        <?php if (in_array($carFeature->car_feature_name, $carFeatures)){
                        echo 'checked=checked';
                        }?>
                        />
                    </div>
                    <?php endforeach; ?>
                    </div>
                   
                   
                    <div class="row justify-content-center mt-2 mt-md-4">
                       
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block">Edit model</button>
                        </div>

                        <div class="col-md-4 mt-2 mt-md-0">
                            <a href="car_model.php" type="button" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                    </div>

                    <!-- Car model id -->
                    <div class="col-md-4 mb-2">
                        <input class="form-control" type="hidden" name="carModelId" id="carModelId" value="<?php echo $carModelId;?>" />
                    </div>
               
                </form>

            </div>

        </div>


        <?php include_once '../../includes/footer-inc.php';?>

        <?php include_once '../../includes/scripts-inc.php';?>
</body>

</html>
