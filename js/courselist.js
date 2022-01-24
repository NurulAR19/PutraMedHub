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

        var courseNo;
        //--------GET ALL DATA-----------//
        function SelectAllData(){
            document.getElementById("tbody1").innerHTML="";
            courseNo = 0;
            firebase.database().ref('Course').once('value',
            function(AllRecords){
                AllRecords.forEach(
                    function(CurrentRecord){
                        var courseCode = CurrentRecord.val().CourseCode;
                        var courseName = CurrentRecord.val().CourseName;
                        var createdBy = CurrentRecord.val().CreatedBy;
                        var updatedBy = CurrentRecord.val().UpdatedBy;

                        AddItemsToTable(courseCode, courseName, createdBy, updatedBy);
                    }
                );

                var totalRowCount = 0;
                var rowCount = 0;
                var table = document.getElementById("tbody1");
                var rows = table.getElementsByTagName("tr")
                for (var i = 0; i < rows.length; i++) {
                    totalRowCount++;
                    if (rows[i].getElementsByTagName("td").length > 0) {
                        rowCount++;
                    }
                     document.getElementById('TotalNoOfRecords').innerHTML = "Showing: " + rowCount + " out of " + totalRowCount + " courses." ;
                }
            });
           
        }
        window.onload = SelectAllData;
        

        //---------FILLING TABLE----------------//
        
        var courseList = [];

        function AddItemsToTable(courseCode, courseName, createdBy, updatedBy){
            var tbody = document.getElementById("tbody1");
            var trow = document.createElement("tr");
            var td0 = document.createElement("td");
            var td1 = document.createElement("td");
            var td2 = document.createElement("td");
            var td3 = document.createElement("td");
            var td4 = document.createElement("td");

            courseList.push([courseCode, courseName, createdBy, updatedBy])

            td0.innerHTML = ++courseNo;
            td1.innerHTML = courseCode;
            td2.innerHTML = courseName;
            td3.innerHTML = createdBy;
            td4.innerHTML = updatedBy;
            
            td1.classList +="courseCodeField";
            td2.classList +="courseNameField";
            td3.classList +="LecturerField";
            td4.classList +="LecturerField";

            trow.appendChild(td0).style.textAlign = 'center';
            trow.appendChild(td1);
            trow.appendChild(td2);
            trow.appendChild(td3).style.textAlign = 'center';
            trow.appendChild(td4).style.textAlign = 'center';
            

            var EditDiv = document.createElement('div');
            EditDiv.innerHTML = '<button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#EditCourseModal" onclick="FillTboxes('+courseNo+')" title="Update course"><i class="fa fa-edit" aria-hidden="true"></i></button>'
            
            trow.appendChild(EditDiv).style.textAlign = 'center';
            tbody.appendChild(trow);
            

        }

        var ModCourseCode = document.getElementById('CourseCodeMod');
        var ModCourseName= document.getElementById('CourseNameMod');
        var ModCreatedBy = document.getElementById('full_name');
        var ModUpdatedBy = document.getElementById('full_name');

        var BtnModAdd = document.getElementById('AddBtn');
        var BtnModUpd = document.getElementById('UpdBtn');
        var BtnModDel= document.getElementById('DelBtn');
        
        function FillTboxes(index){
            if(index==null){
                ModCourseCode.value = "";
                ModCourseName.value = "";

                BtnModAdd.style.display='inline-block';
                BtnModUpd.style.display='none';
                BtnModDel.style.display='none';
            }
            else{
                --index;
                ModCourseCode.value = courseList[index][0];
                ModCourseName.value = courseList[index][1];

                ModCourseCode.disabled = true;

                // BtnModAdd.style.display='none';
                BtnModUpd.style.display='inline-block';
                BtnModDel.style.display='inline-block';
            }
        }

        function AddCourse(){
            firebase.database().ref("Course/"+ ModCourseCode.value).set(
                {
                    CourseCode: ModCourseCode.value,
                    CourseName: ModCourseName.value,
                    CreatedBy: ModCreatedBy.value,
                    UpdatedBy: ModUpdatedBy.value,
                },
                (error) =>{
                    if(error){
                        alert("Course added failed. Error cocured");
                    }
                    else{
                        alert("Course successfully added");
                        SelectAllData();
                        $("staticBackdrop").modal('hide');
                    }
                }
            )
        }
        
        function UpdateCourse(){
        
            firebase.database().ref("Course/"+ ModCourseCode.value).update(
            {
                CourseCode: ModCourseCode.value,
                CourseName: ModCourseName.value,
                UpdatedBy: ModUpdatedBy.value
            },
            (error) =>{
                if(error){
                    alert("Course was not updated. Error occurred");
                }
                else{
                    alert("Course successfully updated");
                    SelectAllData();
                    $("staticBackdrop").modal('hide');
                }
            }

            )
        }

        function RemoveCourse(){
            firebase.database().ref("Course/"+ ModCourseCode.value).remove().then(
                function(){
                  
                    alert("Course successfully removed");
                    SelectAllData();
                    $("staticBackdrop").modal('hide');
                }
            )
        }

        var searchBar = document.getElementById("SearchBar");
        var searchBtn = document.getElementById("SearchBtn");
        var category = document.getElementById("CategorySelected");
        var tbody = document.getElementById("tbody1");

        function SearchTable(Category){
            var filter = searchBar.value.toUpperCase();
            var tr = tbody.getElementsByTagName("tr");
            var found;

            for (let i = 0; i < tr.length; i++) {

               var td = tr[i].getElementsByClassName(Category);

               for (let j = 0; j < td.length; j++) {
                   if(td[j].innerHTML.toUpperCase().indexOf(filter)>-1){
                       found = true;
                   }  
               }
               if (found){
                   tr[i].style.display ="";
                   found= false;
               }
               else{
                   tr[i].style.display ="none";  
                //    document.getElementById('message').innerHTML = "No matched found." ;
               }  
            }
        }

        searchBtn.onclick = function(){
            if(searchBar.value ==""){
                SearchTable("courseCodeField");
            }
            else if(category.value == 1)
            SearchTable("courseCodeField");

            else if(category.value == 2)
            SearchTable("courseNameField");

            else if(category.value == 3)
            SearchTable("LecturerField");
        }

        searchBar.onkeypress = function(event){
            if(event.keyCode==13){
                searchBtn.click();
            }
        }

        function refreshPage(){
            window.location.reload();
        } 
        
        
       



       