<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-1.php');
?>

<head>
    <style>
        input{
            margin-bottom: 5px;
        }
    </style>
    <title>PMH Course Management- Edit</title>
</head>

    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <!-- <h2></h2> -->
            <br>
                <div class="card">
                    <div class="card-header">
                        <h4>
                        Update Course
                        <a href="courselist.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php
                        include('dbcon.php');

                        if(isset($_GET['id']))
                        {
                            $key_child = $_GET['id'];
                            $ref_table = 'Course';
                            $getdata = $database->getReference($ref_table)->getChild($key_child)->getValue();

                            if($getdata > 0)
                            {
                                ?>
                            
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="full_name" id="full_name" value="<?=$user->displayName;?>">
                            <input type="hidden" name="key" value="<?=$key_child;?>">
                            <div class="form-group mb-3">
                                <label for="">Course Code</label>  
                                <input type="text" name="CourseCode" value="<?=$getdata['CourseCode'];?>" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Course Name</label>  
                                <input type="text" name="CourseName" value="<?=$getdata['CourseName'];?>" class="form-control">
                            </div>
                            
                            <br>
                            <div class= "col-md-8">
                            <div class="form-group mb-3">
                                <button type="submit" name="update_course_admin" class="btn btn-primary">Save</button>
                            </div>
                            </div>
                            
                            </form>
                    

                        <?php
                            
                            }
                                else
                                {
                                    $_SESSION['status'] = "Invalid. No record found";
                                    header('Location: dashboard.php');
                                    exit();

                                }
                        }
                        else
                            {
                                $_SESSION['status'] = "Not found";
                                header('Location: dashboard.php');
                                exit();

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
    