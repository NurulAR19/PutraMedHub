<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
     <!--  Bootstrap css file  -->
     <link rel="stylesheet" href="./css/bootstrap.min.css">
     <link rel="stylesheet" href="js/bootstrap.bundle.min.js">
     <link rel="stylesheet" href="js/bootstrap.bundle.js">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!-- Font file -->
     <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
     
     <!-- CSS file -->
     <link rel="stylesheet" href="style.css">  
     <link rel="stylesheet" href="css/modal.css"> 
     <link rel="stylesheet" href="css/footer.css"> 
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
   

     <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.js"></script>
     
     <title>Putra Med-hub</title> 
     <link rel="icon" href="img/favicon.png" type="icon" sizes="16x16">
</head>
<style>
    model-viewer{
        width:300px;
        height: 600px;
        /* margin: 0 auto; */
        position: absolute;
        right: 0;
        margin-top: 8%;
        margin-right: 3%;
        animation: elongate 2s infinite ease-in-out alternate;
        
    }
</style>

<body>
    
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light p-md-3">
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
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-black" href="sign-in.php">Sign In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text" href="sign-up.php"
                style="background-color: #2fa4c2; color: white; border-radius: 10px;">Register</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      
    <!-- Banner Section  -->
    <div class="sketchfab-embed-wrapper"> <iframe title="Ecorche - Anatomy study" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/e402d3d541eb4b199c57d5410f5d3c57/embed"> </iframe> <p style="font-size: 13px; font-weight: normal; margin: 5px; color: #4A4A4A;"> <a href="https://sketchfab.com/3d-models/ecorche-anatomy-study-e402d3d541eb4b199c57d5410f5d3c57?utm_medium=embed&utm_campaign=share-popup&utm_content=e402d3d541eb4b199c57d5410f5d3c57" target="_blank" style="font-weight: bold; color: #1CAAD9;"> Ecorche - Anatomy study </a> by <a href="https://sketchfab.com/BeatrizGomez?utm_medium=embed&utm_campaign=share-popup&utm_content=e402d3d541eb4b199c57d5410f5d3c57" target="_blank" style="font-weight: bold; color: #1CAAD9;"> Beatriz Gomez Santamaria </a> on <a href="https://sketchfab.com?utm_medium=embed&utm_campaign=share-popup&utm_content=e402d3d541eb4b199c57d5410f5d3c57" target="_blank" style="font-weight: bold; color: #1CAAD9;">Sketchfab</a></p></div>
    <model-viewer src="model/ecorche/scene.gltf" shadow-intensity="1" ar ar-modes="webxr scene-viewer quick-look"  camera-controls auto-rotate alt="Human Anatomy by Beatriz Gomez Santamaria" ar style="background-color: unset;" title="Human Anatomy by Beatriz Gomez Santamaria"></model-viewer>
    <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
    
    <!-- <div class="content text-center"> -->
        <div class="welcome-text justify-content-center">
            <h1><strong>Experience AR with interactive learning environment in
            <span><h1 class="typewriter-animation" style="color: #2fa4c2;">medical education </h1></span>
            </strong></h1>
            <br>
            <p>
                Get the application to explore 3D models in
                augmented reality environment.
            </p>
            <button type="button" id="myBtn" data-toggle="modal" data-target="#myModal">Download App</button>
        </div>
        <div>
          <?php
                if(isset($_SESSION['status']))
                {
                    echo"<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                    unset($_SESSION['status']);
                }
            ?> 
        </div>
        
    </div>
   
    <!-- Main Content Area -->
    <main>

    <div class="container my-5 d-grid gap-5">
      <div class="title">
        <h1>Learn anything, anytime, anywhere.</h1>
      </div>
      
      
      <div class="row align-items-center">
      
        <div class="col">
          <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="img/robina-weermeijer-z8_-Fmfz06c-unsplash.jpg" alt="Photo by Robina Weermeijer on Unsplash" title="Photo by Robina Weermeijer on Unsplash">
            <div class="card-body">
              <h5 class="card-title">Get ready to learn</h5>
              <p class="card-text">Study wherever you are using uploaded online resources by medical lecturers.</p>
              
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="img/national-cancer-institute-NFvdKIhxYlU-unsplash.jpg" alt="Photo by National Cancer Institute on Unsplash" title="Photo by National Cancer Institute on Unsplash">
            <div class="card-body">
              <h5 class="card-title">Keep learning materials organise</h5>
              <p class="card-text">View, download and store files easily.</p>
              
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="img/nino-liverani-EayqAlQiFeQ-unsplash.jpg" alt="Photo by Nino Liverani on Unsplash" title="Photo by Nino Liverani on Unsplash">
            <div class="card-body">
              <h5 class="card-title">Explore the structures</h5>
              <p class="card-text">Discern the human structures clearly using AR technology.</p>
              
            </div>
          </div>
        </div>
      </div>
      </div>
      
    </div>
    
    <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=putramedhub@gmail.com&su=Inquiry/Comment on Putra Med-hub&body=Hi Admin,%20" title="Contact Us" class="btn btn-lg rounded-circle" id="email" role="button" target="_blank">
    <i class="fa fa-envelope-open" aria-hidden="true"></i>
    </a>
    
    </main>
    
    
    <!-- Get App Modal -->
       
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div><span class="close">&times;</span></div>
        <p>Scan this QR code to install the application</p>
        <img class="qr-code" src="img/qrcode_drive_pmh_apk.google.com.png" alt="download app">
        <p>or</p>
        <a href="https://drive.google.com/drive/folders/1WgplYbYEKXnh70jeKoOZZFkC2vm3oCCS?usp=sharing" download="APK Putra Med-hub" target="_blank">
        <button type="button" class="btn btn-primary" style="background-color: #2fa4c2; border:#2fa4c2">
        <i class="fa fa-cloud-download"></i>&nbsp;&nbsp;Click here to Install</button></a>
    </div>
    </div>
    
    <!-- Footer Section -->
    <footer class="web-footer">
      <p>All rights reserved by &copy;PUTRA MED-HUB</a> (2021-2022) </p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

    <!-- JS Script -->
    <script src="js/bootstrap.bundle.min.js"></script>
    

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

    <!--Modal Function -->
    <script>
      // Get the modal
      var modal = document.getElementById("myModal");
      

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on the button, open the modal
      btn.onclick = function() {
      modal.style.display = "block";
      
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
      modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
      }
    </script>

</body>
</html>
