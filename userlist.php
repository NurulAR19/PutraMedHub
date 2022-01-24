<?php
include('admin_auth.php');
include('includes/header.php');
include('includes/navbar-1.php');
?>

<head><title>PMH User Management</title></head>
    <br>
  

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php
                    if(isset($_SESSION['status']))
                    {
                        echo"<h5 class='alert alert-info'>".$_SESSION['status']."</h5>";
                        unset($_SESSION['status']);
                    }
                ?>
            <br> <h2>User Management</h2><br>

                <div class="card">
                    <div class="card-header">
                        <h4>
                        Registered User Profile
                        <a href="home.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th style="text-align: center">No.</th>
                                  <th>Username</th>
                                  <th>Email</th>
                                  <th>Role</th>
                                  <th style="text-align: center">Edit</th>
                                  <th style="text-align: center">Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    include('dbcon.php');
                                    $users = $auth->listUsers();

                                    $i =1;

                                    foreach ($users as $user) {
                                       
                                        ?>
                                        <tr>
                                            <td style="text-align: center"><?=$i++?></td>
                                            <td><?=$user->displayName ?></td>
                                            <td><?=$user->email ?></td>
                                            <td><span class="text-info">
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
                                            </span></td>
                                            <td style="text-align: center">
                                                <a href="userlist-edit.php?id=<?=$user->uid;?>" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            </td>
                                            <td style="text-align: center">
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="reg_user_delete_btn" value="<?=$user->uid;?>" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    } 
                                    
                                ?>
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<?php
include('includes/footer.php');