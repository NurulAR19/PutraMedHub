<?php
// include('authentication.php');
include('lecturer_auth.php');
include('includes/header.php');
include('includes/navbar-2.php');
?>

<head><title>Home</title></head>
<style>
    p{
        color: #2fa4c2;
    }

    .imgplant{
        width: 148px;
        position: absolute;
        bottom: 2%;
        right: 0.5%;
    }
</style>

<br><br>
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

    <div class="card w-100 p-4 border-0 rounded bg-light bg-gradient">
    <h3 class="mb-4"><b>Good Day <?=$user->displayName;?> &#128512</b></h3>
        <img class="imgplant" src="img/seed.png" onload="newFacts()">
        <p class="text-dark mb-1">Let's get some positivity today:</p>
        <div id="factsDisplay" style="font-size:small; font-style: italic; color: #454545;"><!--Display medical facts --></div>
        
    </div>
   
<h1 class="display-6 mb-5 mt-4">Dashboard</h1>
    
    <!-- Search section starts-->
    <div class="input-group mb-3 mt-3">
    <input type="text" id="SearchBar" class="form-control" placeholder="Search a record" aria-describedby="button-addon2">
    <div class="input-group-append">
        <select class="form-select" id="CategorySelected">
            <option selected>Category</option>
            <option value="1">Course Code</option>
            <option value="2">Course Name</option>
            <option value="3">Lecturer</option>
        </select>
        </div>
        <button class="btn btn-outline-primary" type="button" id="SearchBtn" title="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
    <!-- Search section ends-->

<div class="row">
<div clss="col-md-10">
    <div class="card">
        <div class="card-header">
            <h4>Courses List
<!--             <a href="add-course.php" class="btn btn-primary float-end disabled" title="Add Course" >
            <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Course</a> -->
            </button>
            </h4>
        </div>


        <div class="card-body">
        <table class="table table-bordered table-hover" id="course">
            <thead class="table-light">
                <th style="text-align: center">No.</th>
                <th>Course Code</th>
                <th>Course Name</th>
                <th style="text-align: center">Created by</th>
                <th style="text-align: center">Last Modified by</th>
                <th style="text-align: center">Action</th>
            </thead>

            <tbody id="tbody1"></tbody>
            
        </table>
        <p id="TotalNoOfRecords"  class="text-muted" style="font-size: smaller;"></p>
        <p id="message"  class="text-muted" style="font-size: smaller;"></p>

        <!-- Modal Edit Course -->
        <div class="modal fade" id="EditCourseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="font-weight: bold;">Update Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="refreshPage()"></button>
            </div>
            <div class="modal-body">
            <input type="hidden" name="full_name" id="full_name" value="<?=$user->displayName;?>">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="form-group mb-3">
                        <label for="">Course Code</label>  
                        <input type="text"  id="CourseCodeMod" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Course Name</label>  
                        <input type="text"  id="CourseNameMod" class="form-control">
                    </div>
                    <!-- <div class="form-group mb-3">
                        <button id="AddBtn" class="btn btn-success" onclick="AddCourse()">Add</button>
                        <button id="UpdBtn" class="btn btn-success" onclick="UpdateCourse()">Update</button>
                        <button id="DelBtn" class="btn btn-danger" onclick="RemoveCourse()">Remove</button> 
                    </div> -->
                    
                </div>
                <hr><h6><b>Upload Teaching Materials</b></h6><br>
                <div class="col-md-6 mb-2 border-end">
                    <div class="form-group mb-3">
                        <p><u>Lecture Notes</u></p>
                        <input type="text" placeholder="File name" id="file_name" class="form-control mb-2"/>
                        <input type="file" value="upload" id="fileButton1" class="form-control" onsubmit="fileURL()"/>
                        <label id="UpProgress1" style="color: green;"></label>
                        <progress value="0"  max="100" id="uploader1" style="width:100%; height: 20px;  display: none"></progress>
                    </div>
                </div>
               
                <div class="col-md-6 border-end">
                    <div class="form-group mb-3">
                        <p><u>Augmented Reality Model</u></p>
                        <input type="text" placeholder="File name" id="ar_name" class="form-control mb-2"/>
                        <input type="file" value="upload" id="fileButton3"  accept=".fbx, .obj, .glb, .gltf, .zip, .rar" class="form-control" onsubmit="fileURL()"/>
                        <label id="UpProgress3" style="color: green;"></label>
                        <progress value="0"  max="100" id="uploader3" style="width:100%; height: 20px; display: none"></progress>
                    </div>
                </div>

                <div class="col-md-6 border-end">
                    <div class="form-group mb-3">
                        <p><u>Video Recordings</u></p>
                        <input type="text" placeholder="File name" id="vid_name" class="form-control mb-2"/>
                        <input type="file" value="upload" id="fileButton2" accept=".mp4, .mov" class="form-control" onsubmit="fileURL()"/>
                        <label id="UpProgress2" style="color: green;"></label>
                        <progress value="0"  max="100" id="uploader2" style="width:100%; height: 20px; display: none"></progress>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <!-- <button id="AddBtn" class="btn btn-success" onclick="AddCourse()">Add</button> -->
                <button id="UpdBtn" class="btn btn-success" onclick="UpdateCourse()">Update</button>
                <!-- <button id="DelBtn" class="btn btn-danger" onclick="RemoveCourse()">Remove</button> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
            </div>
           
            </div>
        </div>
        </div>

        
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <!-- <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase.js"></script> -->
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
        
        <!-- Import script and firebase operation -->
        <script id="MainScript" src="js/app.js"></script>


        </div>
    </div> 
</div>
</div>

<?php
include('includes/footer.php');
?>
