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

     <!-- Font file -->
     <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
     
     <!-- CSS file -->
     <link rel="stylesheet" href="css/sign-style.css">  
     
     <title>Sign Up Putra Med-hub</title> 
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
                
                <h1>Sign Up</h1> 
                <p> Welcome to Putra Med-hub</p>
                
                <form action="code.php" method="POST">
                
                    <div class="input-field">
                        <i class="fa fa-user"></i>
                        <input type="text" placeholder="Username" name="full_name" class="form-control" required/>
                    </div>

                    <!-- <div class="input-field">
                        <i class="fa fa-id-card"></i>
                        <input type="text" placeholder="UPM ID" name="phone_no" class="form-control"/>
                    </div> -->

                    <!-- <div class="input-field">
                        <i class="fa fa-phone"></i>
                        <input type="text" placeholder="Phone Number" name="phone" class="form-control"/>
                    </div> -->

                    <!-- <div class="input-field">
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        <input type="hidden" name="claims_user_id" value="<?=$uid;?>">
                        <select name="role_as" value="" id="" class="form-control" style="border: 0; border-radius: 55px"/>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="editor">Lecturer</option>
                            <option value="viewer">Student</option>
                        </select>
                    </div> -->

                
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="UPM Email Address" name="email" class="form-control" required/>
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
                    <button type="submit" name="register_btn" class="btn solid">Register</button>
                    </div>
                
                    </form>

                    <div class="direct">
                        <p>Already have an account? 
                        <a class="card-link" href="sign-in.php">Click here to login</a>
                        </p>
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