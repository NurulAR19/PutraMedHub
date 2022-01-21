<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-3.php');
?>

<head>
    <title>Home</title>
     <!-- CSS file -->
     <link rel="stylesheet" href="css/main.css">  
</head>

<br>

<div class="container">
    <?php
            if(isset($_SESSION['status']))
            {
                echo"<h5 class='alert alert-info'>".$_SESSION['status']."</h5>";
                unset($_SESSION['status']);
            }
    ?>
    
     <!-- Card for greet user -->
     <script src="js/facts.js"></script>

    <div class="card w-100 p-4 border-0 rounded bg-light bg-gradient" style="box-shadow:none">
    <h3 class="mb-4"><b>Good Day <?=$user->displayName;?> &#128512</b></h3>
        <img class="imgplant" src="img/watering-plants.png" onload="newFacts()">
        <p1 class="text-dark mb-1">Let's get some positivity today:</p1>
        <div id="factsDisplay" style="font-size:small; font-style: italic; color: #454545;"><!--Display medical facts --></div>
        
    </div>

    <h1 class="display-6 my-3 mb-5 mt-4">My Courses</h1>
    <div class="row fluid ">
   
    <?php 
        //  include('dbcon.php');

         $uid = $_SESSION['verified_user_id'];
         $user = $auth->getUser($uid);
         $ref_table = "Course";
         $fetchdata = $database->getReference($ref_table)->getValue();
        
        foreach ( $fetchdata as $key => $elements) : ?>
        
        <div class="col-sm-4 mt-3" style="padding: 16px;">
            <div class="card-columns-fluid ">
                <div class="card bg-white" id="course" style = "width: 20rem; height: 12rem; text-align: left;">
                <!-- <img src="img/files.png" class="card-img-top rounded-circle w-50" style="margin-top: -4.0rem; margin-left: 25%;"> -->
                    <div class="card-body">
                        <div class="course title h-5">
                            <img src="img/brain.png" class="brain pt-3">
                            <h4 class="card-title pt-3" style="font-weight: bold"><?=$elements['CourseCode'];?></h4>
                            <p><?=$elements['CourseName'];?></p>
                        </div>
                        <div class="card-text">
                            <!-- <a href="course.php?id=<?=$key?>"class="btn btn-outline-secondary btn-sm stretched-link float-end  position-absolute bottom-0 end-0 mb-5 me-2">View</a> -->
                            <a href="courses.php?id=<?=$key?>"class="stretched-link "></a>
                        </div>
                    </div>
                    
                    <div class="card-footer"><i>last modified by:&nbsp<?=$elements['UpdatedBy'];?></i></div>
                </div>
            </div>
           
        </div>
        
        
    <?php endforeach; ?>
    </div>
</div> 


<?php
include('includes/footer.php');
?>