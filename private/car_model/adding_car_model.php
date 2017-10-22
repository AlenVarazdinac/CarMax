<?php
include_once '../../config.php';

$carMakeName = $_POST['carMakeName'];
$carModelName = $_POST['carModelName'];
$carVariantName = $_POST['carVariantName'];
$carModelPrice = $_POST['carModelPrice'];
$carModelPower = $_POST['carModelPower'];
$carModelMileage = $_POST['carModelMileage'];
$carModelGearbox = $_POST['carModelGearbox'];
$carModelFuelType = $_POST['carModelFuelType'];
$carModelFuelCons = $_POST['carModelFuelCons'];
$carModelDesc = $_POST['carModelDesc'];
if(isset($_POST['carFeature'])) {
    $carFeature = $_POST['carFeature'];
}

if($carMakeName && $carModelName && $carModelPower && $carModelPrice && $carModelMileage && $carModelGearbox && $carModelFuelType != '') {
    $db->beginTransaction();
    
    $command = $db->prepare("INSERT INTO car_model (car_model_name, car_model_variant, car_model_price, car_model_power, car_model_mileage, car_model_gearbox, car_model_fuel_type, car_model_fuel_cons, car_model_desc, car_make_id) VALUES (:car_model_name, :car_model_variant, :car_model_price, :car_model_power, :car_model_mileage, :car_model_gearbox, :car_model_fuel_type, :car_model_fuel_cons, :car_model_desc, :car_make_id)");
    $command->bindParam('car_model_name', $carModelName);
    $command->bindparam('car_model_variant', $carVariantName);
    $command->bindParam('car_model_price', $carModelPrice);
    $command->bindParam('car_model_power', $carModelPower);
    $command->bindParam('car_model_mileage', $carModelMileage);
    $command->bindParam('car_model_gearbox', $carModelGearbox);
    $command->bindParam('car_model_fuel_type', $carModelFuelType);
    $command->bindParam('car_model_fuel_cons', $carModelFuelCons);
    $command->bindParam('car_model_desc', $carModelDesc);
    $command->bindparam('car_make_id', $carMakeName);
    $command->execute();
    
    $lastId = $db->lastInsertId();
    
    if($carFeature!=''){
        foreach($carFeature as $feature) {
            $command = $db->prepare("INSERT INTO model_feature(model_id, feature_id) VALUES (:model_id, :feature_id)");
            $command->bindParam('model_id', $lastId);
            $command->bindParam('feature_id', $feature);
            $command->execute();    
        }    
    }
    
    
    
    $db->commit();

    if(isset($_FILES['file2'])) {
        move_uploaded_file($_FILES['file2']['tmp_name'], "../../img/car_model/" . $lastId . ".jpg");
    }

    header('location: car_model.php');    
}
