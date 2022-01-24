<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-2.php');
?>
    <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">       
            <div class="card">
                <div class="card-header">
                    <h4>Add Course
                    <a href="dashboard.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                <form name="myForm" action="" onsubmit="return validateForm()" method="post">
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
                    <button id="Selbtn" class="btn btn-primary">Select</button>
                    <button id="Updbtn" class="btn btn-primary">Update</button>
                    <button id="Delbtn" class="btn btn-danger">Delete</button>
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
        var selBtn = document.getElementById("Selbtn");
        var updBtn = document.getElementById("Updbtn");
        var delBtn = document.getElementById("Delbtn");
    
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
                CourseCode: CourseCodeBox.value,
                CourseName: CourseNameBox.value
            })
            .then(()=>{
                alert("Data stored successfully");
            })
            .catch((error)=>{
                alert("Unsuccessful. " + error);
            });
        }
        
    }

    // ------------------Select data function---------------------//

    function SelectData(){
        const dbref = ref(db);

        get(child(dbref,"Course/"+ CourseCodeBox.value)).then((snapshot)=>{
            if(snapshot.exists()){
                
                CourseNameBox.value = snapshot.val().CourseName;
            }
            else{
                alert("No record found");
            }
        })
        .catch((error)=>{
            alert("Unsuccessful. " + error);
        });
    }

    // ------------------Update data function---------------------//

    function UpdateData(){
        update(ref(db,"Course/"+ CourseCodeBox.value),{
            CourseName: CourseNameBox.value
        })
        .then(()=>{
            alert("Data updated successfully");
        })
        .catch((error)=>{
            alert("Unsuccessful. " + error);
        });
    }

    // ------------------Delete data function---------------------//

    function DeleteData(){
        remove(ref(db,"Course/"+ CourseCodeBox.value))
        .then(()=>{
            alert("Data deleted successfully");
            document.getElementById("CourseCodeBox").value = '';
            document.getElementById("CourseNameBox").value = '';
        })
        .catch((error)=>{
            alert("Unsuccessful. " + error);
        });
    }

    // ------------------Assigns Events to Buttons----------------------//
  
    insBtn.addEventListener('click', InsertData);
    selBtn.addEventListener('click', SelectData);
    updBtn.addEventListener('click', UpdateData);
    delBtn.addEventListener('click', DeleteData);
   
    </script>


<?php
include('includes/footer.php');
?>
    