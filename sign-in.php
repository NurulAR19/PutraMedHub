<?php
session_start();

if(isset($_SESSION['verified_user_id']))
{
    $_SESSION['status']= "You are already logged in";
    header('Location: dashboard.php');
    exit();
}
include('includes/header.php');
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>

     <!-- Google Font file -->
     <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
     
     
     <!-- CSS file -->
     <link rel="stylesheet" href="css/sign-style.css">  
     
     <title>Sign In Putra Med-hub</title> 
     <link rel="icon" href="img/favicon.png" type="icon" sizes="16x16">
</head>

<body>
    <div class="container" style="width:60%; margin-top:2%">
        <?php
            if(isset($_SESSION['status']))
            {
                echo"<h5 class='alert alert-info'>".$_SESSION['status']."</h5>";
                unset($_SESSION['status']);
            }
        ?>  
    </div>
            
            <a href="index.php">
            <img class="logo" src="img/favicon.png" alt="Putra Med-hub logo">
            </a>
            <div class="wrapper">
            <div class="card">
            <div class="card-header">
                <h1>Sign In</h1> 
                <p>to access your dashboard</p>
                <div class="card-body">
                    <form action="logincode.php" method="POST">
                    
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email"  placeholder="UPM Email Address" name="email" class="form-control" required/>
                    </div>
                    
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" class="form-control" id="myInput" required>
                        <span><i class="fa fa-eye" aria-hidden="true" id="eye1" onclick="myFunction()" title="Hide password"></i></span>
                        <span><i class="fa fa-eye-slash" aria-hidden="true" id="eye2" onclick="myFunction()" title="Show password"></i></span>
                    </div>

                    <!-- <div>
                        <input type="checkbox" onclick="myFunction()" style="margin-bottom: 20px"/>  Show password
                    </div> -->
                    
                    <div class="form-group mb-3">
                        <button type="submit" name="login_btn" class="btn solid">Login</button>
                    </div>
                                
                    </form>

                    <div class="direct">
                        <p>Don't have account? 
                        <a class="card-link" href="sign-up.php">Click here to register</a>
                        </p>
                    </div>
                </div>
            </div>
            </div>
            </div>
            
            
    <script>
    function myFunction() {
        var x = document.getElementById("myInput");
        var y = document.getElementById("eye1");
        var z = document.getElementById("eye2");

        if (x.type === "password") {
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        } else {
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
    </script>
    
    <footer>
        <p class="text-muted">2021-2022 &copy; Putra Med-hub</p>
    </footer>
</body>
</html>

<?php
include('includes/footer.php');
?>