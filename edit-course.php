<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-2.php');
?>

<head>
    <style>
        input{
            margin-bottom: 5px;
        }
    </style>
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
                        <a href="dashboard.php" class="btn btn-danger float-end">BACK</a>
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
                            
                            <input type="hidden" name="key" value="<?=$key_child;?>">
                            <div class="form-group mb-3">
                                <label for="">Course Code</label>  
                                <input type="text" name="course_code" value="<?=$getdata['CourseCode'];?>" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Course Name</label>  
                                <input type="text" name="course_name" value="<?=$getdata['CourseName'];?>" class="form-control">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for=""><strong>Upload teaching materials</strong></label>
                                <div class="input-group mb-3"> </div>
                            </div>

                            <div class="card">
                            <div class="card-header">
                                <h6><i class="fa fa-file-text" aria-hidden="true"></i> &nbsp;Lecture Notes</h6>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <!-- <label>File Name</label>
                                    <input type="text" placeholder="" id="file_name" class="form-control"/> 
                                    <input type="file" name="notes[]" class="form-control" multiple/>
                                    <label id="UpProgress1" style="color: green;"></label>
                                    <progress value="0" max="100" step="0.01"id="uploader1" style="width:100%; height: 20px;">0%</progress> -->
                                    <input type="file" name="notes[]" class="form-control" id="file" multiple>
                                    <input type='submit' class="btn btn-primary" name='submit' value='Upload'>
                        
                                </div>
                            </div>
                            </div>

                            <div class="card">
                            <div class="card-header">
                                <h6><i class="fa fa-file-video-o" aria-hidden="true"></i> &nbsp;Video Recordings</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>File Name</label>
                                    <input type="text" placeholder="" id="video_name" class="form-control"/>
                                    <input type="file" name="videos[]"accept=".mp4, .mov" id="fileButton2"  class="form-control" multiple/>
                                
                                    <label id="UpProgress2" style="color: green;"></label>
                                    <progress value="0" max="100" id="uploader2" style="width:100%; height: 20px;">0%</progress>
                                </div>
                            </div>
                            </div>
                            <div class="card">
                            <div class="card-header">
                                <h6><i class="fa fa-cubes" aria-hidden="true"></i> &nbsp;Augmented Reality Materials</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>File Name</label>
                                    <input type="text" placeholder="" id="ar_name" class="form-control"/>
                                    <input type="file" value="upload" id="fileButton3" class="form-control" multiple/>
                                    <label id="UpProgress3" style="color: green;"></label>
                                    <progress value="0"  max="100" id="uploader3" style="width:100%; height: 20px;"></progress>
                                </div>
                            </div>
                            </div>
                               
                            <br>
                            <div class= "col-md-8">
                            <div class="form-group mb-3">
                                <button type="submit" name="update_course" class="btn btn-primary">Save</button>
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

    
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>

        
    <script>
       

        // Initialize Firebase
		var firebaseConfig = {
            apiKey: "AIzaSyCnUzaGSSNBlhiIMrM3VreZkyCYd3WCNf8",
            authDomain: "putramedhub.firebaseapp.com",
            databaseURL: "https://putramedhub-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "putramedhub",
            storageBucket: "putramedhub.appspot.com",
            messagingSenderId: "830640634563",
            appId: "1:830640634563:web:c6db3966d084083320c076",
            measurementId: "G-VLV6R6B080"
        };
		
        firebase.initializeApp(firebaseConfig);

        // Get a reference to the database service
        var database = firebase.database();
	</script>

    <script type="text/javascript">

        //Lecture Notes Bucket

        //-----------------VARIABLES---------------------//
        var FileName,FileUrl;
        var reader = new FileReader();

        //Get elements
        var uploader1 = document.getElementById('uploader1');
        var fileButton = document.getElementById('fileButton1');
        
        //Listen dor the file selection
        fileButton.addEventListener('change', function(e) {
            // Get file
            var file = e.target.files[0];
            var FileName = document.getElementById('file_name').value;

            //Create a storage ref
            var storageRef = firebase.storage().ref('LectureNotes/'+ file.name);

            // Upload file
            var task = storageRef.put(file);

            // Update progress bar
            task.on('state changed',
            function progress(snapshot) {
                var percentage = (snapshot.bytesTransferred / snapshot.totalBytes)*100;
                uploader1.value = percentage;
                document.getElementById('UpProgress1').innerHTML = 'Upload ' + percentage+ '%';
                
            },
            
            function error(){
                alert('Error in saving files');
            },

            function(){
                task.snapshot.ref.getDownloadURL().then(function(url){
                    FileUrl = url;
                
                    firebase.database().ref('TeachingMaterials/LectureNotes/'+FileName).set({
                        Name: FileName,
                        Link: FileUrl
                    });
                alert('File successfully added.');
            });
    
        });


        });
        
    </script>

    <script type="text/javascript">
        //Video Recordings Bucket
        //-----------------VARIABLES---------------------//
        var VideoName, VideoUrl;
        var reader = new FileReader();

        //Get elements
        var uploader2 = document.getElementById('uploader2');
        var fileButton = document.getElementById('fileButton2');
        
        //Listen dor the file selection
        fileButton.addEventListener('change', function(e) {
            // Get file
            var file = e.target.files[0];
            var VideoName = document.getElementById('video_name').value;

            //Create a storage ref
            var storageRef = firebase.storage().ref('VideoRecordings/'+ file.name);

            // Upload file
            var task = storageRef.put(file);
            
            // Update progress bar
            task.on('state changed',
            function progress(snapshot) {
                var percentage = (snapshot.bytesTransferred / snapshot.totalBytes)*100;
                uploader2.value = percentage;
                document.getElementById('UpProgress2').innerHTML = 'Upload ' + percentage+ '%';
                
            },
            
            function error(){
                alert('Error in saving files');
            },

            function(){
                task.snapshot.ref.getDownloadURL().then(function(url){
                    VideoUrl = url;
                    
                    firebase.database().ref('TeachingMaterials/VideoRecordings/'+VideoName).set({
                        Name: VideoName,
                        Link: VideoUrl
                    });
                alert('File successfully added.');
            });
    
        });


        });
        
    </script>

    <script type="text/javascript">
        //Augmented Reallity Materials Bucket

        //-----------------VARIABLES---------------------//
        var ARName, ARUrl;
        var reader = new FileReader();

        //Get elements
        var uploader3 = document.getElementById('uploader3');
        var fileButton = document.getElementById('fileButton3');
        
        //Listen dor the file selection
        fileButton.addEventListener('change', function(e) {
            // Get file
            var file = e.target.files[0];
            var ARName = document.getElementById('ar_name').value;

            //Create a storage ref
            var storageRef = firebase.storage().ref('AssetBundle/'+ file.name);

            // Upload file
            var task = storageRef.put(file);
            
            // Update progress bar
            task.on('state changed',
            function progress(snapshot) {
                var percentage = (snapshot.bytesTransferred / snapshot.totalBytes)*100;
                uploader3.value = percentage;
                document.getElementById('UpProgress3').innerHTML = 'Upload ' + percentage+ '%';
                
            },
            
            function error(){
                alert('Error in saving files');
            },

            function(){
                task.snapshot.ref.getDownloadURL().then(function(url){
                    ARUrl = url;
                
                    firebase.database().ref('Courses/'+ CourseCode +'TeachingMaterials'/+ARName).set({
                        Name: ARName,
                        Link: ARUrl
                    });
                alert('File successfully added.');
            });
    
        });


        });  
        
    </script>

<?php
include('includes/footer.php');
?>
    