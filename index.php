<?php include_once 'config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head-inc.php';?>
</head>

<body>
    <?php include_once 'includes/navigation-inc.php';?>

    <div class="container">
       
        <!-- ##### Carousel ##### -->
        <div id="homeCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#homeCarouselhomeCarousel" data-slide-to="1"></li>
                <li data-target="#homeCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 img-responsive mx-auto" src="img/slides/slide_1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-responsive mx-auto" src="img/slides/slide_2.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-responsive mx-auto" src="img/slides/slide_3.png" alt="Third slide">
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
