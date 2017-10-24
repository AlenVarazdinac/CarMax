<?php

include_once '../../config.php'; checkLogin(); checkRole('Admin');

if(isset($_GET['carFeatureId'])) {
    $command = $db->prepare("DELETE FROM car_feature WHERE car_feature_id=:car_feature_id;");
    $command->execute(array(':car_feature_id'=>$_GET['carFeatureId']));
    header('location: car_feature.php');
}