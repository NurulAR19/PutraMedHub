<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-1.php');
?>
<head><title>PMH Course Management</title></head>
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

            <br> <h2>Course Management</h2><br>
            
            <div class="card">
                    <div class="card-header">
                        <h4>
                            List of Courses
                             <a href="home.php" class="btn btn-danger float-end">BACK</a>
                            <a href="addCourse.php" class="btn btn-primary float-end me-2" title="Add Course">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Course</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                  <th style="text-align: center">No.</th>
                                  <th>Course Code</th>
                                  <th>Course Name</th>
                                  <th style="text-align: center">Edit</th>
                                  <th style="text-align: center">Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    include('dbcon.php');
                                   
                                    $ref_table = "Course";
                                    $fetchdata = $database->getReference($ref_table)->getValue();
                                
                                    if($fetchdata > 0)
                                    {
                                        $i=1;
                                        foreach($fetchdata as $key => $row)
                                    {
                                ?>
                                   <tr>
                                        <td style="text-align: center"><?=$i++;?></td>  
                                        <td><?=$row['CourseCode'];?></td>
                                        <td><?=$row['CourseName'];?></td>
                                        <td style="text-align: center">
                                        <a href="editCourse.php?id=<?=$key?>" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>

                                        <td style="text-align: center">
                                            <form action="code.php" method="POST">
                                                <button type="submit" name="delete_btn_admin" value="<?=$key?>" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                            }
                                    }
                                    else
                                    {
                                    ?>
                                       <tr>
                                             <td colspan="5">No record found</td>
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

    
<?php
include('includes/footer.php');
?>