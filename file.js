     // ----------Import Configuration---------------//
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

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
 
 //--------GET ALL DATA-----------//
 function SelectAllFiles(){
    document.getElementById("tbody2").innerHTML="";
    fileNo = 0;
    firebase.database().ref("Course/").child(ModCourseCode + "TeachingMaterials/Notes/").on('value',
    function(AllRecords){
        AllRecords.forEach(
            function(CurrentRecord){
                var Name = CurrentRecord.val().Name;
                var Link = CurrentRecord.val().Link;
                // var createdBy = CurrentRecord.val().CreatedBy;
                // var updatedBy = CurrentRecord.val().UpdatedBy;

                AddItemsToTableFiles(Name, Link);
            }
        );
    });
}
window.onload = SelectAllFiles;

//---------FILLING TABLE----------------//

var fileList = [];

function AddItemsToTableFiles(Name, Link){
    var tbody = document.getElementById("tbody2");
    var trow = document.createElement("tr");
    var td0 = document.createElement("td");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    // var td3 = document.createElement("td");
    // var td4 = document.createElement("td");

    fileList.push([Name, Link])

    td0.innerHTML = ++fileNo;
    td1.innerHTML = Name;
    td2.innerHTML = '<li><a href="'+Link+'" target="_blank">'+Name+'</a></li>';

    td0.style.display ='none';
    td1.style.display = 'none';
    // td3.innerHTML = createdBy;
    // td4.innerHTML = updatedBy;

    // td1.classList +="courseCodeField";
    // td2.classList +="courseNameField";
    // td3.classList +="LecturerField";
    // td4.classList +="LecturerField";

    trow.appendChild(td0);
    trow.appendChild(td1);
    trow.appendChild(td2);
    // trow.appendChild(td3).style.textAlign = 'center';
    // trow.appendChild(td4).style.textAlign = 'center';
    

    var RemoveDiv = document.createElement('td');
    RemoveDiv.innerHTML = '<button type="button" class="btn" onclick="RemoveFile()" title="Delete file"><i class="fa fa-trash" aria-hidden="true"></i></button>'


    trow.appendChild(RemoveDiv).style.textAlign = 'center';
    tbody.appendChild(trow);
    

}

