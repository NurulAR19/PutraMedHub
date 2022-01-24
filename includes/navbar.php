<head>
    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font file -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    
    <!-- CSS file -->
    <link rel="stylesheet" href="css/navbar.css"> 
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light p-md-3">
  
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
          <a class="nav-link text-black"  href="dashboard.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-black" href="user-acc.php">Profile</a>
        </li>

        <?php 
          if(!isset($_SESSION['verified_user_id'])): ?>

        <li class="nav-item">
          <a class="nav-link text-black"  href="sign-in.php">Sign In</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-black"  href="sign-up.php">Sign Up</a>
        </li>
        
        <?php else: ?>

        <li class="nav-item">
          <a class="nav-link text"  href="sign-out.php"
          style="background-color: #2fa4c2; color: white; border-radius: 10px; ">Sign Out</a>
        </li>

        <?php endif; ?>
      </ul>
  </div>
</div>
</nav>

<!-- Navbar Function -->
<script type="text/javascript">
        var nav = document.querySelector('nav');
  
        window.addEventListener('scroll', function () {
          if (window.pageYOffset > 100) {
            nav.classList.add('bg-light', 'shadow');
          } else {
            nav.classList.remove('bg-light', 'shadow');
          }
        });

</script>