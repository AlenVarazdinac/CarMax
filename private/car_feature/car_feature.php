<?php include_once '../../config.php'; checkLogin(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../../includes/navigation-inc.php';?>

    <?php 
    $command = $db->prepare('SELECT * FROM car_feature;');
    $command->execute();
    $result = $command->fetchAll(PDO::FETCH_OBJ);
    
    $number = 1;
    ?>


    <div class="container mt-5">
        
        <h2 class="text-center">Car features</h2>
        <div class="row justify-content-center">
            <table class="table table-striped table-inverse">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Feature name</th>
                        <?php if(isset($_SESSION['logged']) && $_SESSION['logged']->user_rights==='Admin'): ?>
                        <th class="text-center">Option</th>
                        <?php endif;?>
                    </tr>
                </thead>

                <tbody>
                    <!-- Show all car features -->
                    <?php foreach($result as $carFeature): ?>
                    <tr>
                        <th class="text-center" scope="row">
                            <?php echo $number; $number++;?>
                        </th>
                        <td class="text-center">
                            <?php echo $carFeature->car_feature_name;?>
                        </td>
                        <?php if(isset($_SESSION['logged']) && $_SESSION['logged']->user_rights==='Admin'): ?>
                        <td class="text-center"><a href="car_feature_edit.php?carFeatureId=<?php echo $carFeature->car_feature_id;?>">Edit</a> | <a href="removing_car_feature.php?carFeatureId=<?php echo $carFeature->car_feature_id;?>">Remove</a></td>
                        <?php endif;?>
                    </tr>
                    <?php endforeach; ?>
                    
                    
                    <!-- Add car feature -->
                    <?php if(isset($_SESSION['logged']) && $_SESSION['logged']->user_rights==='Admin'): ?>
                    <tr>
                        <td class="text-center" colspan="3"><a href="car_feature_add.php">Click to add new car feature</td></a>
                    </tr>
                    <?php endif; ?>
                    
                </tbody>

            </table>
        </div>

    </div>


    <?php include_once '../../includes/footer-inc.php';?>

    <?php include_once '../../includes/scripts-inc.php';?>
</body>

</html>
