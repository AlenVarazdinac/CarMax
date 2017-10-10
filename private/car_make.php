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

        <div class="row">

            <!-- Add button for car make -->
            <div class="col-md-3 jumbotron mx-2">
                <i class="fa fa-plus-circle fa-5x d-flex justify-content-center mb-3" aria-hidden="true"></i>
                <a href="car_make_add.php" class="btn btn-primary d-flex justify-content-center mb-0">Add</a>
            </div>

            <!-- Show all car makes -->
            <?php foreach($result as $carMake): ?>

            <div class="col-md-3 jumbotron py-5 mx-2">

                <?php if(file_exists("../img/car_make/" . $carMake->car_make_name . ".jpg")) : ?>
                <img src="<?php echo $appPath . "img/car_make/" . $carMake->car_make_name . ".jpg";?>" alt="Car Make Logo" class="w-100" />

                <?php endif; ?>
                <a href="#" class="btn btn-primary d-flex justify-content-center mb-0">Show</a>
            </div>

            <?php endforeach; ?>

        </div>




    </div>


    <?php include_once '../includes/footer-inc.php';?>

    <?php include_once '../includes/scripts-inc.php';?>
</body>

</html>
