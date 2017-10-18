<?php

include_once '../../config.php';

$carFeatureName = $_POST['carFeatureName'];

if($carFeatureName !== '') {
    $command = $db->prepare("INSERT INTO car_feature(car_feature_name) VALUES (:car_feature_name)");
    $command->bindParam('car_feature_name', $carFeatureName);
    $command->execute();
    
    header("location: car_feature.php");
} else {
    header("location: car_feature.php");
}
