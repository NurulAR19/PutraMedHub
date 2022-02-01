
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


//--------LECTURE NOTES : GET ALL DATA-----------//

function SelectAllLectureNotes(){
    document.getElementById("tbody3").innerHTML="";
    LectureNotesNo = 0;

    var CourseCode = document.getElementById('key');
    // var ModCourseCode = document.getElementById('CourseCodeMod');

    firebase.database().ref("Course/" + CourseCode.value + '/' + "Notes/").on('value',
    function(AllRecords){
        AllRecords.forEach(
            function(CurrentRecord){
                var Name = CurrentRecord.val().Name;
                var Link = CurrentRecord.val().Link;

                AddItemsToTableLectureNotes(Name, Link);
            }
        );
    });
}
window.onload = SelectAllLectureNotes;

//---------LECTURE NOTES: FILLING TABLE----------------//

var LectureNotesList = [];

function AddItemsToTableLectureNotes(Name, Link){
    var tbody = document.getElementById("tbody3");
    var trow = document.createElement("tr");
    var td0 = document.createElement("td");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");

    LectureNotesList.push([Name, Link])
    
    td0.innerHTML = ++LectureNotesNo;
    td1.innerHTML = '<input type="hidden" id="fileName" value="'+Name+'">';
    td2.innerHTML = '<li><a href="'+Link+'" target="_blank">'+Name+'</a></li>';

    td0.style.display ='none';
    td1.style.display = 'none';
    // td1.setAttribute('id','fileName');
    trow.appendChild(td0);
    trow.appendChild(td1);
    trow.appendChild(td2);
    
    var ActionDiv = document.createElement('td');
    ActionDiv.innerHTML = '<button type="button" class="btn float-end" onclick="removeFile()" title="Delete file"><i class="fa fa-trash" aria-hidden="true"></i></button>'
    ActionDiv.innerHTML+= '<button type="button" class="btn float-end" data-bs-toggle="modal" data-bs-target="#EditNoteModal" onclick="FillNoteboxes('+LectureNotesNo+')" title="Update file"><i class="fa fa-edit" aria-hidden="true"></i></button>'


    trow.appendChild(ActionDiv).style.textAlign = 'center';
    tbody.appendChild(trow);
    

}

//--------VIDEO MODEL: GET ALL DATA-----------//

function SelectAllVideos(){
    document.getElementById("tbody4").innerHTML="";
    VideosNo = 0;

    var CourseCode = document.getElementById('key');
    // var ModCourseCode = document.getElementById('CourseCodeMod');

    firebase.database().ref("Course/" + CourseCode.value + '/' + "Video/").on('value',
    function(Videos){
        Videos.forEach(
            function(CurrentRecord){
                var Name = CurrentRecord.val().Name;
                var Link = CurrentRecord.val().Link;

                AddItemsToTableVideos(Name, Link);
            }
        );
    });
}
window.addEventListener("load", SelectAllVideos, false);

//--------- VIDEO: FILLING TABLE----------------//

var VideoList = [];

function AddItemsToTableVideos(Name, Link){
    
    var tbody = document.getElementById("tbody4");
    var trow = document.createElement("tr");
    var td0 = document.createElement("td");
    var td1 = document.createElement("td");
    // var tr1 = document.createElement("tr");

    VideoList.push([Name, Link])

    td0.innerHTML = ++VideosNo;
    td1.innerHTML = '<input type="hidden" id="VideoName" value="'+Name+'"><li>'+Name+'</li><br><video id="video" width="640" height="360" controls><source src="'+Link+'" type="video/mp4"></video>';
    // tr1.innerHTML = '<video id="video" width="640" height="360" controls><source src="'+Link+'" type="video/.mp4, .mov"></video>';

    td0.style.display ='none';
    td1.style.display = 'inline-block';

    trow.appendChild(td0);
    trow.appendChild(td1);
    

    var ActionDiv = document.createElement('td');
    ActionDiv.innerHTML = '<button type="button" class="btn float-end" onclick="removeVideo()" title="Delete file"><i class="fa fa-trash" aria-hidden="true"></i></button>'
    ActionDiv.innerHTML+= '<button type="button" class="btn float-end" data-bs-toggle="modal" data-bs-target="#EditNoteModal" onclick="FillVidboxes('+VideosNo+')" title="Update file"><i class="fa fa-edit" aria-hidden="true"></i></button>'


    trow.appendChild(ActionDiv).style.textAlign = 'center';
    tbody.appendChild(trow);
    // tbody.appendChild(tr1);
    

}


//--------AR MODEL: GET ALL DATA-----------//

function SelectAllAR(){
    document.getElementById("tbody5").innerHTML="";
    ARNo = 0;

    var CourseCode = document.getElementById('key');
    // var ModCourseCode = document.getElementById('CourseCodeMod');

    firebase.database().ref("Course/" + CourseCode.value + '/' + "AssetBundle/").on('value',
    function(AR){
        AR.forEach(
            function(CurrentRecord){
                var Name = CurrentRecord.val().Name;
                var Link = CurrentRecord.val().Link;

                AddItemsToTableAR(Name, Link);
            }
        );
    });
}
window.addEventListener("load", SelectAllAR, false);

//--------- AR MODEL: FILLING TABLE----------------//

var ARList = [];

function AddItemsToTableAR(Name, Link){
    var tbody = document.getElementById("tbody5");
    var trow = document.createElement("tr");
    var td0 = document.createElement("td");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");

    ARList.push([Name, Link])

    td0.innerHTML = ++ARNo;
    td1.innerHTML = '<input type="hidden" id="ARName" value="'+Name+'">';
    td2.innerHTML = '<li><a href="'+Link+'" target="_blank">'+Name+'</a></li>';

    td0.style.display ='none';
    td1.style.display = 'none';
   

    trow.appendChild(td0);
    trow.appendChild(td1);
    trow.appendChild(td2);
    

    var ActionDiv = document.createElement('td');
    ActionDiv.innerHTML = '<button type="button" class="btn float-end" onclick="removeAR()" title="Delete file"><i class="fa fa-trash" aria-hidden="true"></i></button>'
    ActionDiv.innerHTML+= '<button type="button" class="btn float-end" data-bs-toggle="modal" data-bs-target="#EditNoteModal" onclick="FillARboxes('+ARNo+')" title="Update file"><i class="fa fa-edit" aria-hidden="true"></i></button>'

    trow.appendChild(ActionDiv).style.textAlign = 'center';
    tbody.appendChild(trow);
    

}

//-------Update Note Model from Database---------//
var ModNoteFileName = document.getElementById('NameMod');
var BtnModUpd1 = document.getElementById('UpdNoteBtn');
var BtnModUpd2 = document.getElementById('UpdVideoBtn');
var BtnModUpd3 = document.getElementById('UpdArBtn');

function FillNoteboxes(index){
    if(index==null){
        ModNoteFileName.value = "";
        
    }
    else{
        --index;
        ModNoteFileName.value = LectureNotesList[index][0];
        BtnModUpd1.style.display='inline-block';
        BtnModUpd2.style.display='none';
        BtnModUpd3.style.display='none';

    }
}

function updateNotes(){
    var CourseCode = document.getElementById('key');
    var Name = document.getElementById('fileName');
    firebase.database().ref('Course/'+ CourseCode.value + '/' + 'Notes/' + Name.value).update(
        {
            Name: ModNoteFileName.value,
            
        },
        (error) =>{
            if(error){
                alert(Name.value + " was not updated. Error occurred");
            }
            else{
                alert( Name.value + " successfully updated");
                SelectAllLectureNotes();
                
            }
        }
    )
}


//-------Update Video Model from Database---------//
var ModVidFileName = document.getElementById('NameMod');
var BtnModUpd2 = document.getElementById('UpdVideoBtn');

function FillVidboxes(index){
    if(index==null){
        ModVidFileName.value = "";
        
    }
    else{
        --index;
        ModVidFileName.value = VideoList[index][0];
        BtnModUpd2.style.display='inline-block';
        BtnModUpd1.style.display='none';
        BtnModUpd3.style.display='none';

    }
}

function updateVid(){
    var CourseCode = document.getElementById('key');
    var Name = document.getElementById('VideoName');
    firebase.database().ref('Course/'+ CourseCode.value + '/' + 'Video/' + Name.value).update(
        {
            Name: ModVidFileName.value,
            
        },
        (error) =>{
            if(error){
                alert(Name.value + " was not updated. Error occurred");
            }
            else{
                alert( Name.value + " successfully updated");
                SelectAllVideos();
               
            }
        }
    )
}

//-------Update AR Model from Database---------//
var ModARFileName = document.getElementById('NameMod');
var BtnModUpd3 = document.getElementById('UpdARBtn');

function FillARboxes(index){
    if(index==null){
        ModARFileName.value = "";
        
    }
    else{
        --index;
        ModARFileName.value = ARList[index][0];
        BtnModUpd3.style.display='inline-block';
        BtnModUpd1.style.display='none';
        BtnModUpd2.style.display='none';

    }
}

function updateAR(){
    var CourseCode = document.getElementById('key');
    var Name = document.getElementById('ARName');
    firebase.database().ref('Course/'+ CourseCode.value + '/' + 'AssetBundle/' + Name.value).update(
        {
            Name: ModARFileName.value,
            
        },
        (error) =>{
            if(error){
                alert(Name.value + " was not updated. Error occurred");
            }
            else{
                alert( Name.value + " successfully updated");
                SelectAllAR();
                
            }
        }
    )
}


 //-------Delete Lecture Notes from Database and Storage---------//
 function removeFile(){
    var CourseCode = document.getElementById('key');
    var Name = document.getElementById('fileName');

    //Remove form firebase database
    firebase.database().ref('Course/'+ CourseCode.value + '/' + 'Notes/' + Name.value).remove();

    //Remove from firebase storage
    const storageRef = firebase.storage().ref('Notes/' + CourseCode.value + '/' +  Name.value);
    storageRef.delete().then(()=>{
        alert("File " + Name.value + " successfully deleted");
        
    }).catch((error) =>{
        alert("File " + Name.value + "  not successfully deleted");
    });
    
    SelectAllLectureNotes();
}

//-------Delete Video Recordings from Database and Storage---------//
function removeVideo(){
    var CourseCode = document.getElementById('key');
    var Name = document.getElementById('VideoName');

    //Remove form firebase database
    firebase.database().ref('Course/'+ CourseCode.value + '/' + 'Video/' + Name.value).remove();

    //Remove from firebase storage
    const storageRef = firebase.storage().ref('Video/' + CourseCode.value + '/' +  Name.value);
    storageRef.delete().then(()=>{
        alert("Video " + Name.value + " successfully deleted");
        
    }).catch((error) =>{
        alert("Video " + Name.value + "  not successfully deleted");
    });
    
    SelectAllVideos();
}

//-------Delete AR Model from Database and Storage---------//
function removeAR(){
    var CourseCode = document.getElementById('key');
    var Name = document.getElementById('ARName');

    //Remove form firebase database
    firebase.database().ref('Course/'+ CourseCode.value + '/' + 'AssetBundle/' + Name.value).remove();

    //Remove from firebase storage
    const storageRef = firebase.storage().ref('AssetBundle/' + CourseCode.value + '/' + Name.value);
    storageRef.delete().then(()=>{
        alert("AR Model " + Name.value + " successfully deleted");
        
    }).catch((error) =>{
        alert("AR Model " + Name.value + "  not successfully deleted");
    });
    
    SelectAllAR();
}
