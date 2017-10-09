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
        
        <div class="col-md-3 jumbotron py-5">
           
            <?php if(file_exists("../img/car_make/" . $carMake->car_make_id . ".png")) : ?>
               <img src="<?php echo $appPath . "img/car_make/" . $carMake->car_make_id . ".png";?>" alt="Car Make Logo" class="w-100" />
               
            <?php endif; ?>
            <a href="#" class="btn btn-primary d-flex justify-content-center mb-0">Show</a>
        </div>
        
        <?php endforeach; ?>


    </div>




    <?php include_once '../includes/scripts-inc.php';?>
</body>

</html>
