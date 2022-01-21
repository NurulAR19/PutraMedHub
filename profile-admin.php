<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-1.php');
?>


<head>
    <title>PMH My Profile</title>
</head>

<br><br>
<div class="container">
    
    <?php
        if(isset($_SESSION['status']))
        {
            echo"<h5 class='alert alert-info'>".$_SESSION['status']."</h5>";
            unset($_SESSION['status']);
        }     
    ?>
                
        <h1 class="display-6 my-3 mb-5">My Profile</h1>
        <div class="row">
            <div class="col-md-2">
            <img src="img/user-icon.png" class="rounded-circle" alt="..." style="width: 125px; align-items: center; ">
            </div>
            <div class="col-md-6"> 
            <div class="card">
                    <div class="card-header"><b>Edit Profile</b></div>
                    <div class="card-body bg-white">
                    <?php
                        if(isset($_SESSION['verified_user_id']))
                        {
                            $uid = $_SESSION['verified_user_id'];
                            $user = $auth->getUser($uid);
                            ?>
                            
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12">
                                      
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Username</label>
                                        <input type="text" name="full_name" value="<?=$user->displayName;?>" required class="form-control bg-light">
                                    </div>

                                            
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Email Address</label>
                                        <div class="form-control bg-light"><?=$user->email;?></div>
                                    </div>
                    
                                                
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Role</label>
                                        <div class="form-control bg-light">
                                        <?php
                                            $claims = $auth ->getUser($user->uid)->customClaims;
                                            if(isset($claims['admin']) == true)
                                            {
                                                echo "Admin";
                                            }
                                            elseif(isset($claims['editor']) == true)
                                            {
                                                echo "Lecturer";
                                            }
                                            elseif(isset($claims['viewer']) == true)
                                            {
                                                echo "Student";
                                            }
                                        ?>
                                        </div>
                                    </div>
                                                
                                    <div class="form-group mb-3">
                                        <button type="submit" name="update_lecturer_profile_btn" class="btn btn-primary rounded-pill">Update</button>
                                    </div>
                                </div>
                            </form>

                        <?php
                        }
                    ?>
                    
                    </div>
                </div>
     </div>
</div>    

<?php
include('includes/footer.php');
?>
    