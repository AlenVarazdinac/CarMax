<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo $appName;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Browse
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Car make</a>
          <a class="dropdown-item" href="#">Car model</a>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="<?php echo $appPath;?>public/login.php" class="btn btn-info my-2 my-sm-0 text-light" type="submit">Log in</a>
      <a class="btn btn-primary ml-2 my-2 my-sm-0 text-light" type="submit">Register</a>
    </form>
  </div>
</nav>