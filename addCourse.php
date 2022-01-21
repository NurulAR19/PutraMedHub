<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-1.php');
?>
<head><title>PMH Course Management- Add</title></head>
     <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">       
            <div class="card">
                <div class="card-header">
                    <h4>Add Course
                    <a href="courselist.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                <form name="myForm" action="" onsubmit="return validateForm()" method="post">
                <input type="hidden" name="full_name" id="full_name" value="<?=$user->displayName;?>">
                    <div class="form-group mb-3">
                        <label for="">Course Code</label>  
                        <input type="text"  id="CourseCodeBox" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Course Name</label>  
                        <input type="text"  id="CourseNameBox" class="form-control" required>
                    </div>

                    <hr>
                    <button id="Insbtn" class="btn btn-success">Save</button>
                   
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------- IMPORTS + CONFIGURATION ------------------->

    <script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyCnUzaGSSNBlhiIMrM3VreZkyCYd3WCNf8",
        authDomain: "putramedhub.firebaseapp.com",
        databaseURL: "https://putramedhub-default-rtdb.asia-southeast1.firebasedatabase.app",
        projectId: "putramedhub",
        storageBucket: "putramedhub.appspot.com",
        messagingSenderId: "830640634563",
        appId: "1:830640634563:web:c6db3966d084083320c076",
        measurementId: "G-VLV6R6B080"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);

    import{getDatabase, ref, get, set, child, update, remove}
    from "https://www.gstatic.com/firebasejs/9.1.3/firebase-database.js";

    const db = getDatabase();

    // ------------------References----------------------//
        var CourseCodeBox = document.getElementById("CourseCodeBox");
        var CourseNameBox = document.getElementById("CourseNameBox");

        var insBtn = document.getElementById("Insbtn");
        
    
    // ------------------Validation Form-------------------//
        function validateForm() {
        let x = document.forms["myForm"]["CourseCodeBox"].value;
            if (x == "") {
                alert("Course info must be filled out.");
                return false;
            }
        }
    // ------------------Insert data----------------------//
    
    
    function InsertData(){
        
        if (CourseCodeBox.value, CourseNameBox.value == "") {
            alert("Course info must be filled out.");
            return false;
        }
        else{
            set(ref(db,"Course/"+ CourseCodeBox.value),{
                CreatedBy: full_name.value,
                CourseCode: CourseCodeBox.value,
                CourseName: CourseNameBox.value,
                UpdatedBy: full_name.value
            })
            .then(()=>{
                alert("Course added successfully");
            })
            .catch((error)=>{
                alert("Unsuccessful. " + error);
            });
        }
        
    }


    // ------------------Assigns Events to Buttons----------------------//
  
    insBtn.addEventListener('click', InsertData);
    
   
    </script>


<?php
include('includes/footer.php');
?>
    