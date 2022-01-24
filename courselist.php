<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-1.php');
?>
<head><title>PMH Course Management</title></head>

<br><br>
<div class="container">
    <?php
        if(isset($_SESSION['status']))
        {
            echo"<h5 class='alert alert-info'>".$_SESSION['status']."</h5>";
            unset($_SESSION['status']);
        }
    ?>

<br> <h2>Course Management</h2><br>
<div class="row">
<div clss="col-md-10">
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
        </div>

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
                    
                </div>

                <div class="modal-footer">
                <!-- <button id="AddBtn" class="btn btn-success" onclick="AddCourse()">Add</button> -->
                <button id="UpdBtn" class="btn btn-success" onclick="UpdateCourse()">Update</button>
                <button id="DelBtn" class="btn btn-danger" onclick="RemoveCourse()">Remove</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
        <script id="MainScript" src="js/courselist.js"></script>


        </div>
    </div> 
</div>
</div>

<?php
include('includes/footer.php');
?>
