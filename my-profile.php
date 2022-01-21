<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-2.php');
?>

<br>
<div class="container">
    
    <?php
        if(isset($_SESSION['status']))
        {
            echo"<h5 class='alert alert-info'>".$_SESSION['status']."</h5>";
            unset($_SESSION['status']);
        }     
    ?>
        <div class="row justify-content-center">
            <div class="col-md-6"> 
                <div class="card">
                    <div class="card-header">
                    <h4 style="text-align: left;">My Profile</h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_SESSION['verified_user_id']))
                        {
                            $uid = $_SESSION['verified_user_id'];
                            $user = $auth->getUser($uid);
                            ?>
                            
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="col-md-10">
                                    <div class="form-group mb-3">
                                        <?php
                                        if($user->photoUrl !=null)
                                        {
                                            ?>
                                            <img src="<?=$user->photoUrl?>" class="img-thumbnail" alt="User Profile" style="border-radius: 50%; width: 200px; height: 200px;">
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="img/avatar.png" class="img-thumbnail" alt="User Profile" style="border-radius: 50%; width: 200px; height: 200px;">
                                            <?php
                                            echo "<h6 class='text-muted'>Update your profile photo</h6>";
                                        }
                                        ?>
                                        
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Upload Profile Image</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                                
                                    <div class="form-group mb-3">
                                        <label for="">Username</label>
                                        <input type="text" name="full_name" value="<?=$user->displayName;?>" required class="form-control">
                                    </div>
                                                
                                                
                                    <div class="form-group mb-3">
                                        <label for="">Email Address</label>
                                        <div class="form-control"><?=$user->email;?></div>
                                    </div>
                                                
                                    <div class="form-group mb-3">
                                        <label for="">Role</label>
                                        <div class="form-control">
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
                                        <button type="submit" name="update_user_profile_btn" class="btn btn-primary">Update</button>
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
</div>    

<?php
include('includes/footer.php');
?>
    