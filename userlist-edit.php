<?php
include('admin_auth.php');
include('dbcon.php');
include('includes/header.php');
include('includes/navbar-1.php');
?>

<head><title>PMH User Management- Edit</title></head>

<br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                    if(isset($_SESSION['status']))
                    {
                        echo"<h5 class='alert alert-info'>".$_SESSION['status']."</h5>";
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>
                        Update User Profile
                        <a href="userlist.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <?php
                                include('dbcon.php');

                                if(isset($_GET['id']))
                                {
                                    $uid = $_GET['id'];
                                    
                                    try {
                                        $user = $auth->getUser($uid);
                                        ?>
                                            <input type="hidden" name="user_id" value="<?=$uid;?>" class="form-control">
                                            <div class="form-group mb-3">
                                                <label for="">Username</label>  
                                                <input type="text" name="full_name" value="<?=$user->displayName;?>" class="form-control">
                                            </div>

                                            <div class="form-group mb-3">
                                                <button type="submit" name="update_user_btn" class="btn btn-primary">Update</button>
                                            </div>

                                            <hr>
                                            <h5>Custom User Claims</h5>
                                            <input type="hidden" name="claims_user_id" value="<?=$uid;?>">
                                            <div class="form-group mb-3">
                                                <select name="role_as" id="" class="form-control">
                                                    <option value="">Select role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="editor">Lecturer</option>
                                                    <option value="viewer">Student</option>
                                                </select>
                                            </div>
                                            <label for="">Currently user role is: </label>
                                            <h4 class="text-success p-2">
                                                <?php
                                                    $claims = $auth ->getUser($uid)->customClaims;
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
                                            </h4>
                                            <div class="form-group mb-3">
                                                <button type="submit" name="user_claims_btn" class="btn btn-primary">Update</button>
                                            </div>

                                        <?php

                                    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                                        echo $e->getMessage();
                                    }
                                }

                            ?>
                           
                        </form>

                    </div>
                </div>
            </div>


    
<?php
include('includes/footer.php');
?>