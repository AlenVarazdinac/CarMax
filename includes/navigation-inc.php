<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $appPath;?>index.php"><img src="<?php echo $appPath;?>img/carmax_logo.png" width="100" height="30" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $appPath;?>index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <?php if(isset($_SESSION['logged'])): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Browse
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo $appPath;?>private/car_make/car_make.php">Car make</a>
                    <a class="dropdown-item" href="<?php echo $appPath;?>private/car_model/car_model.php">Car model</a>
                    <a class="dropdown-item" href="<?php echo $appPath;?>private/car_feature/car_feature.php">Car feature</a>
                </div>
            </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $appPath;?>public/about.php">About</a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Links
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" target="_blank" href="https://github.com/AlenVarazdinac/CarMax">GitHub repository</a>
                    <a class="dropdown-item" href="<?php echo $appPath;?>public/er.php">ER diagram</a>
                </div>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <?php if(!isset($_SESSION['logged'])): ?>
            <a href="<?php echo $appPath;?>public/login.php" class="btn btn-secondary my-2 my-sm-0 text-light" type="submit">Log in</a>
            <a href="<?php echo $appPath;?>public/register.php" class="btn btn-primary ml-2 my-2 my-sm-0 text-light" type="submit">Register</a>
            <?php else: ?>
            <a href="<?php echo $appPath;?>public/logout.php" class="btn btn-danger ml-2 my-2 my-sm-0 text-light" type="submit">Log out</a>
            <?php endif; ?>
        </form>
    </div>
</nav>
