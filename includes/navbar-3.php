<head>
    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font file -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    
    <!-- CSS file -->
    <link rel="stylesheet" href="css/navbar.css"> 
</head>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light p-md-3">
  
<div class="container">
  
  <a class="navbar-brand" href="#" style="font-weight: bold;">
    <img src="img/favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Putra Med-hub
  </a>
  <button
    class="navbar-toggler"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarNav"
    aria-controls="navbarNav"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
  <div class="mx-auto"></div>
    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-black"  href="main.php">Home</a>
        </li>

        <div class="dropdown">
        <?php 
          $uid = $_SESSION['verified_user_id'];
          $user = $auth->getUser($uid);
        ?>
          <button class="btn btn- dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-user-circle fa-lg" aria-hidden="true" style="color: #2fa4c2;"></i>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <!-- <li><a class="dropdown-item" href="profile-users.php"> Hi,&nbsp;<?=$user->displayName;?></a></li> -->
            <!-- <li><a class="dropdown-item" href="my-profile.php">My Profile</a></li> -->
            <li><a class="dropdown-item" href="profile-users.php">My Profile</a></li>
            <li><a class="dropdown-item" href="https://drive.google.com/drive/folders/1y9NUg7qvRF5t50ZnGLSVlyyZicDgY3FL?usp=sharing" target="_blank">Get App</a></li>
            <li><a class="dropdown-item" href="3dmodelviewer.html">3D Model Viewer</a></li>
            <li><a class="dropdown-item" href="sign-out.php">Sign Out</a></li>
          </ul>
        </div>

        
      </ul>
  </div>
</div>
</nav>

