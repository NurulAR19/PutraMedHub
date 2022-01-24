<?php
// include('authentication.php');
include('dbcon.php');
include('admin_auth.php');
include('includes/header.php');
include('includes/navbar-1.php');
?>
<head><title>Home</title></head>
<link rel="stylesheet" href="css/home.css"> 
<br>
<div class="container">
    <div class="row">
        <div clss="col-md-10">

             <?php
                 if(isset($_SESSION['status']))
                 {
                    echo"<h5 class='alert alert-info'>".$_SESSION['status']."</h5>";
                     unset($_SESSION['status']);
                }     
            ?>

            <br><br>
            <div class="jumbotron mt-3">
                <h1 class="display-5">Administrator Panel</h1>
                <?php
                $mydate=getdate(date("U"));
                echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                ?>
                <p class="lead"><?$mydate;?></p>
                <hr class="my-4">
                <!-- <p>Keep working to ensure your users a safe and efficient user experience.</p> -->
                <p class="lead">
                    <!-- <a class="btn btn-primary btn-lg my-2 " href="courselist.php" role="button">Course Management</a>
                    <a class="btn btn-primary btn-lg my-2 ml-2" href="userlist.php" role="button">User Management</a> -->
                    <div class="row">
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="img/list.png" alt="Courses" style="height: 5%;">
                            <div class="card-body">
                                <h5><strong>Course Management</strong></h5>
                                <p class="card-text">Add, update and remove courses.</p>
                                <a href="courselist.php" class="card-link stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="img/user.png"  alt="Users">
                            <div class="card-body">
                                <h5><strong>User Management</strong></h5>
                                <p class="card-text">Manage registered users account.</p>
                                <a href="userlist.php" class="card-link stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>    
</div>

<?php
include('includes/footer.php');
?>