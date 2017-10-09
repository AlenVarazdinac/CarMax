<?php include_once '../config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../includes/navigation-inc.php';?>

    <?php 
    $command = $db->prepare('SELECT * FROM car_make;');
    $command->execute();
    $result = $command->fetchAll(PDO::FETCH_OBJ);
    ?>


    <div class="container mt-5">

        <?php foreach($result as $carMake): ?>
        
        <div class="col-md-3 jumbotron">
            <p><?php echo $carMake->car_make_name;?></p>
        </div>
        
        <?php endforeach; ?>





    </div>




    <?php include_once '../includes/scripts-inc.php';?>
</body>

</html>
