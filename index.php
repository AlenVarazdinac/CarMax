<?php include_once 'config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head-inc.php';?>
</head>

<body>
    <?php include_once 'includes/navigation-inc.php';?>

    <div class="container">
        
        <?php
        $command = $db->query('SELECT car_model_id FROM car_model ORDER BY car_model_price ASC LIMIT 1;');
        while ($row = $command->fetch(PDO::FETCH_ASSOC)) {
            $cheapestModelId = $row['car_model_id'];
        }
        
        $command = $db->query('SELECT car_model_id FROM car_model ORDER BY car_model_price DESC LIMIT 1;');
        while ($row = $command->fetch(PDO::FETCH_ASSOC)) {
            $expensiveModelId = $row['car_model_id'];
        }
        
        $command = $db->query('SELECT car_model_id FROM car_model ORDER BY car_model_id DESC LIMIT 1;');
        while ($row = $command->fetch(PDO::FETCH_ASSOC)) {
            $lastAddedModelId = $row['car_model_id'];
        }
        ?>
        <!-- ##### Carousel ##### -->
        <div id="homeCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#homeCarouselhomeCarousel" data-slide-to="1"></li>
                <li data-target="#homeCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 img-responsive mx-auto carousel_img" src="img/car_model/<?php echo $cheapestModelId;?>.jpg" alt="First slide">
                    <div class="jumbotron">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 style="color: black;">Cheapest car we offer</h3>
                            <a href="private/car_model/car_model_show.php?carModelId=<?php echo $cheapestModelId;?>" class="btn btn-primary">Show</a>
                        </div>    
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-responsive mx-auto carousel_img" src="img/car_model/<?php echo $expensiveModelId;?>.jpg" alt="First slide">
                    <div class="jumbotron">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 style="color: black;">The most expensive car we offer</h3>
                            <a href="private/car_model/car_model_show.php?carModelId=<?php echo $expensiveModelId;?>" class="btn btn-primary">Show</a>
                        </div>    
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-responsive mx-auto carousel_img" src="img/car_model/<?php echo $lastAddedModelId;?>.jpg" alt="First slide">
                    <div class="jumbotron">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 style="color: black;">Latest model added</h3>
                            <a href="private/car_model/car_model_show.php?carModelId=<?php echo $lastAddedModelId;?>" class="btn btn-primary">Show</a>
                        </div>    
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
            <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
        </div>
        
    </div>


    <?php include_once 'includes/footer-inc.php';?>

    <?php include_once 'includes/scripts-inc.php';?>
</body>

</html>
