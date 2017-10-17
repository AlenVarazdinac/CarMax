<?php
include_once '../../config.php';

$carFeatureId = $_POST['carFeatureId'];
$carFeatureName = $_POST['carFeatureName'];


if($carFeatureName != '') {
    $command = $db->prepare("UPDATE car_feature SET car_feature_name=:car_feature_name WHERE car_feature_id=:car_feature_id");
    $command->bindParam('car_feature_name', $carFeatureName);
    $command->bindparam('car_feature_id', $carFeatureId);
    $command->execute();

    header('location: car_feature.php');    
} else {
    header('location: car_feature.php');    
}