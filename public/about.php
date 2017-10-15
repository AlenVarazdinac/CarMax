<?php include_once '../config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../includes/head-inc.php';?>
</head>

<body>
    <?php include_once '../includes/navigation-inc.php';?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d86720.1403106756!2d8.567134531407984!3d47.216496507057386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x213e0c79afac3d32!2sCarmax+AG!5e0!3m2!1sen!2shr!4v1508097549019" height="450" class="w-100" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <h3>About us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet tempora consequatur, suscipit, dolores commodi labore ducimus molestias neque hic excepturi, soluta.</p>
            </div>
            
            <div class="col-md-6">
                <h3>Contact us</h3>
                <form method="post" action="send_message.php" class="">
                    <input type="email" name="contactEmail" placeholder="Email" class="form-control"/>
                    <input type="text" name="contactSubject" placeholder="Subject" class="form-control mt-2" />
                    <textarea name="contactMessage" placeholder="Message" class="form-control mt-2"></textarea>
                    <input type="submit" class="btn btn-primary btn-block mt-2 align-self-end" value="Send" disabled />
                </form>
                
            </div>
            
        </div>


    </div>

    <?php include_once '../includes/footer-inc.php';?>

    <?php include_once '../includes/scripts-inc.php';?>
</body>

</html>
