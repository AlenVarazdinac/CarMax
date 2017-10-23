<?php include_once '../../config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../../includes/navigation-inc.php';?>

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
                
                <p><?php echo $carMake->car_make_name;?></p>
                
                <?php if(file_exists("../../img/car_make/" . $carMake->car_make_id . ".jpg")) : ?>
                <img src="<?php echo $appPath . "img/car_make/" . $carMake->car_make_id . ".jpg";?>" alt="Car Make Logo" class="w-100" />

                <?php endif; ?>
                <a href="../car_model/car_model.php?selectedCarMake=<?php echo $carMake->car_make_id; ?>" class="btn btn-primary d-flex justify-content-center mb-0">Show</a>
                
                <form action="car_make_edit.php" method="get">
                
                    <button class="btn btn-dark d-flex justify-content-center mb-2 mt-2 col-md-12">Edit</button>
                    <input type="hidden" name="carMakeId" id="carMakeId" value="<?php echo $carMake->car_make_id;?>" />   
                                     
                </form>
                
                <a href="removing_car_make.php?car_make_id=<?php echo $carMake->car_make_id;?>" class="btn btn-danger d-flex justify-content-center mb-0">Remove</a>
                
            </div>

            <?php endforeach; ?>

        </div>




    </div>


    <?php include_once '../../includes/footer-inc.php';?>

    <?php include_once '../../includes/scripts-inc.php';?>
</body>

</html>
