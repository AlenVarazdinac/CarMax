<?php
include_once '../../config.php';

$carMakeId = $_POST['carMakeId'];
$carModelId = $_POST['carModelId'];
$carModelName = $_POST['carModelName'];
$carVariantName = $_POST['carVariantName'];
$carModelPrice = $_POST['carModelPrice'];
$carModelPower = $_POST['carModelPower'];
$carModelMileage = $_POST['carModelMileage'];
$carModelGearbox = $_POST['carModelGearbox'];
$carModelFuelType = $_POST['carModelFuelType'];
$carModelFuelCons = $_POST['carModelFuelCons'];
$carModelDesc = $_POST['carModelDesc'];



if($carMakeId && $carModelName && $carModelPower && $carModelPrice && $carModelMileage && $carModelGearbox && $carModelFuelType != '') {
    
    $db->beginTransaction();
    
    $command = $db->prepare("UPDATE car_model SET car_model_name=:car_model_name, car_model_variant=:car_model_variant, car_model_price=:car_model_price, car_model_power=:car_model_power, car_model_mileage=:car_model_mileage, car_model_gearbox=:car_model_gearbox, car_model_fuel_type=:car_model_fuel_type, car_model_fuel_cons=:car_model_fuel_cons, car_model_desc=:car_model_desc, car_make_id=:car_make_id WHERE car_model_id=:car_model_id");
    $command->bindParam('car_model_name', $carModelName);
    $command->bindparam('car_model_variant', $carVariantName);
    $command->bindParam('car_model_price', $carModelPrice);
    $command->bindParam('car_model_power', $carModelPower);
    $command->bindParam('car_model_mileage', $carModelMileage);
    $command->bindParam('car_model_gearbox', $carModelGearbox);
    $command->bindParam('car_model_fuel_type', $carModelFuelType);
    $command->bindParam('car_model_fuel_cons', $carModelFuelCons);
    $command->bindParam('car_model_desc', $carModelDesc);
    $command->bindParam('car_make_id', $carMakeId);
    $command->bindParam('car_model_id', $carModelId);
    $command->execute();
    
     $command = $db->prepare("delete from model_feature WHERE model_id=:model_id;");
        $command->bindParam('model_id', $carModelId);
        $command->execute();

    foreach($_POST["carFeature"] as $value) {
        $command = $db->prepare("insert into model_feature (feature_id, model_id) values(:feature_id,:model_id);");
        $command->bindParam('feature_id', $value);
        $command->bindParam('model_id', $carModelId);
        $command->execute();
    }
    
    $db->commit();
    
    if(isset($_FILES['file2'])) {
        move_uploaded_file($_FILES['file2']['tmp_name'], "../../img/car_model/" . $carModelId . ".jpg");
    }

    header('location: car_model.php');    
}