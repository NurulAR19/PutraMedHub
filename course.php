<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-2.php');
include('dbcon.php');

if(isset($_GET['id']))
{
    $key_child = $_GET['id'];
    $ref_table = 'Course';
    $getdata = $database->getReference($ref_table)->getChild($key_child)->getValue();
}
?>

<head>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.js"></script>
    <link rel="stylesheet" href="css/course.css">
    <head><title>Course</title></head>
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
        <div class="row justify-content-center">
        <div class="col-md-9">
            
                <?php
                    include('dbcon.php');

                    if(isset($_GET['id']))
                    {
                        $key_child = $_GET['id'];
                        $ref_table = 'Course';
                        $TeachingMaterials ='TeachingMaterials';
                        $notes = 'Notes';
                        $file ='key';
                        
                        $getdata = $database->getReference($ref_table)->getChild($key_child)->getValue();
                        $getMetadata = $database->getReference($ref_table)->getChild($key_child)->getChild($TeachingMaterials)->getChild($notes)->getValue();

                        if($getdata > 0)
                        {
                ?>
                <br>
                    <input type="hidden" name="key" id="key" value="<?=$key_child;?>">
                    <input type="hidden"  id="CourseCodeMod" value="<?=$getdata['CourseCode'];?>" class="form-control" >
                    <h3><b><?=$getdata['CourseCode'];?>:&nbsp;<?=$getdata['CourseName'];?></b>
                    <a href="dashboard.php" class="btn btn-danger float-end rounded-pill">BACK</a>
                    </h3>
                <br>
                            
                    <form action="code.php" method="POST">
                        <div class="form-group mb-3">
                            <!-- <label for="fileButton"><strong>Teaching materials</strong></label> -->
                            <div class="input-group mb-3"> </div>
                        </div>
                    
                        <h5 class="text-md-start mt-2 ms-2 mb-3" style="color: #2fa4c2;">Lecture Notes</h5>
                        <div class="card mb-5">
                            <div class="card-body">
                                <table class="table table-sm table-borderless">
                                <thead class="table-light" style="display: none;">
                                    <!-- <th>No.</th> -->
                                    <th>File</th>
                                    <!-- <th>Link</th> -->
                                    <th style="text-align: center">Remove</th>
                                </thead>

                                <tbody id="tbody3">
                                    
                                </tbody>
                                </table>
                            </div>
                        </div>

                            
                            <h5 class="text-md-start mt-2 ms-2 mb-3" style="color: #2fa4c2;">Video Recordings</h5>
                            <div class="card mb-5">
                            <div class="card-body">
                                <table class="table table-sm table-borderless">
                                <thead class="table-light" style="display: none;">
                                    <!-- <th>No.</th> -->
                                    <th>File</th>
                                    <!-- <th>Link</th> -->
                                    <th style="text-align: center">Remove</th>
                                </thead>
                                <tbody id="tbody4">
                                </tbody>
                                </table>
                            </div>
                            </div>
                            
                           
                            <h5 class="text-md-start mt-2 ms-2 mb-3" style="color: #2fa4c2;">Augmented Reality Model</h5>
                            <div class="card mb-5">
                            <div class="card-body">
                                <div class="form-group">
                                <ul>
                                    <!-- <li>
                                    <model-viewer src="model/anatomyofhuman.gltf" camera-controls auto-rotate ar ></model-viewer>
                                    </li> -->
                                </ul>
                                <table class="table table-sm table-borderless">
                                <thead class="table-light" style="display: none;">
                                    <!-- <th>No.</th> -->
                                    <th>File</th>
                                    <!-- <th>Link</th> -->
                                    <th style="text-align: center">Remove</th>
                                </thead>

                                <tbody id="tbody5">
                                    
                                </tbody>
                                </table>
                                </div>
                                
                            </div>
                            </div>
                            <br>
                            </form>

                            <button onclick="topFunction()" id="myBtn" class="btn btn-lg rounded-circle" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>
                    

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

    <!-- The core Firebase JS SDK is always required and must be listed first -->
        <!-- <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase.js"></script> -->
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
        
    <script id="MainScript" src="js/course.js"></script>
    <script src="js/up.js" type="text/javascript"></script>
<?php
include('includes/footer.php');
?>
