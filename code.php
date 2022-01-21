<?php
session_start();
include('dbcon.php');

//-------------USER-----------------//

// REGISTER USER
if(isset($_POST['register_btn']))
{
    $fullname = $_POST['full_name']; 
    // $phone = $_POST['phone_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        // 'phoneNumber' => '+60'.$phone,
        'password' => $password,
        'displayName' => $fullname,
        
    ];
    
    $createdUser = $auth->createUser($userProperties);
    $uid = $_POST['user_id'];
    if($createdUser){
        $_SESSION['status'] = "User created/registered successfully. Please login to continue.";
        header('Location: sign-in.php');
        exit();
    }
    else{
        $_SESSION['status'] = "User not created/registered";
        header('Location: sign-up.php');
        exit();
    }

}

//EDIT UPDATE REGISTERED USER
if(isset($_POST['update_user_btn']))
{
    
    $displayName = $_POST['full_name'];

    $uid = $_POST['user_id'];
    $properties = [
        'displayName' => $displayName,
    ];

    $updatedUser = $auth->updateUser($uid, $properties);
    
    if($updatedUser){
        $_SESSION['status'] = "User updated successfully.";
        header('Location: userlist-edit.php');
        exit();
    }
    else{
        $_SESSION['status'] = "User not updated";
        header('Location: userlist-edit.php');
        exit();
    }

}

// CUSTOME USER CLAIMS (ROLE)
if(isset($_POST['user_claims_btn']))
{
    $uid = $_POST['claims_user_id'];
    $roles = $_POST['role_as'];

    if($roles == 'admin')
    {
        $auth->setCustomUserClaims($uid, ['admin' => true, 'key1' => 'value1']);
        $msg = "User role as Admin";
    }
    
    elseif($roles == 'editor')
    {
        $auth->setCustomUserClaims($uid, ['editor' => true, 'key1' => 'value1']);
        $msg = "User role as Lecturer";
    }
    
    elseif($roles == 'viewer')
    {
        $auth->setCustomUserClaims($uid, ['viewer' => true, 'key1' => 'value1']);
        $msg = "User role as Student";
    
    }

    if($msg)
    {
        $_SESSION['status'] = "$msg";
        header("Location: userlist-edit.php?id=$uid");
        exit();
    }
    else{
        $_SESSION['status'] = "User role not updated";
        header("Location: userlist-edit.php?id=$uid");
        exit();
    }
}

// MY PROFILE UPDATE
if(isset($_POST['update_user_profile_btn']))
{
    $displayName = $_POST['full_name'];
    // $profile = $_FILES['profile']['name'];
    // $random_no = rand(1111,9999);

    $uid = $_SESSION['verified_user_id'];
    $user = $auth->getUser($uid);

    // $new_image = $random_no.$profile;
    // $old_image = $user->photoUrl;

    // if($profile !=null)
    // {
    //     $filename = 'uploads/'.$new_image;
    // }
    // else
    // {
    //     $filename = $old_image;
    // }


    $properties = [
        'displayName' => $displayName,
        // 'photoUrl' => $filename,
    ];

    $updatedUser = $auth->updateUser($uid, $properties);

    if($updatedUser)
    {
    //     if($profile !=null)
    //     {
    //         move_uploaded_file($_FILES['profile']['tmp_name'], "uploads/".$new_image);
    //         if($old_image != null)
    //         {
    //             unlink($old_image);
                
    //         }
    //     }
        
        $_SESSION['status'] = "User profile updated";
        header('Location: profile.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "User profile not updated";
        header('Location: profile.php');
        exit(0);
    }
}

// MY PROFILE UPDATE (ADMIN)
if(isset($_POST['update_admin_profile_btn']))
{
    $displayName = $_POST['full_name'];

    $uid = $_SESSION['verified_user_id'];
    $user = $auth->getUser($uid);

    $properties = [
        'displayName' => $displayName,
        
    ];

    $updatedUser = $auth->updateUser($uid, $properties);

    if($updatedUser)
    {
        
        $_SESSION['status'] = "User profile updated";
        header('Location: profile-admin.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "User profile not updated";
        header('Location: profile-admin.php');
        exit(0);
    }
}

// MY PROFILE UPDATE (ADMIN)
if(isset($_POST['update_lecturer_profile_btn']))
{
    $displayName = $_POST['full_name'];

    $uid = $_SESSION['verified_user_id'];
    $user = $auth->getUser($uid);

    $properties = [
        'displayName' => $displayName,
        
    ];

    $updatedUser = $auth->updateUser($uid, $properties);

    if($updatedUser)
    {
        
        $_SESSION['status'] = "User profile updated";
        header('Location: profile-user.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "User profile not updated";
        header('Location: profile-user.php');
        exit(0);
    }
}

// MY PROFILE UPDATE (STUDENT)
if(isset($_POST['update_student_profile_btn']))
{
    $displayName = $_POST['full_name'];

    $uid = $_SESSION['verified_user_id'];
    $user = $auth->getUser($uid);

    $properties = [
        'displayName' => $displayName,
        
    ];

    $updatedUser = $auth->updateUser($uid, $properties);

    if($updatedUser)
    {
        
        $_SESSION['status'] = "User profile updated";
        header('Location: profile-users.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "User profile not updated";
        header('Location: profile-users.php');
        exit(0);
    }
}

// DELETE REGISTERED USER
if(isset($_POST['reg_user_delete_btn']))
{
    $uid= $_POST['reg_user_delete_btn'];
    
    try{
        $auth->deleteUser($uid);

        $_SESSION['status'] = "User deleted successfully";
        header('Location: userlist.php');
        exit();

    }catch(Exception $e){
        $_SESSION['status'] = "No ID found. Failure occured.";
        header('Location: userlist.php');
        exit();
    }
    
}

//-------------COURSE-----------------//

// ADD COURSE
if(isset($_POST['save_course']))
{
    $CourseCode = $_POST['CourseCode'];
    $CourseName = $_POST['CourseName'];
    $CreatedBy = $_POST['full_name'];
    $UpdatedBy = $_POST['full_name'];
    
    $postData = [
        'CourseCode'=> $CourseCode,
        'CourseName'=> $CourseName,
        'CreatedBy'=> $CreatedBy,
        'UpdatedBy'=> $UpdatedBy,
    ];
    
    $ref_table = 'Course/'.$CourseCode;
    $postRef_result = $database->getReference($ref_table)->push($postData);

    if($postRef_result){
        $_SESSION['status'] = "Course successfully added";
        header('Location: dashboard.php');
    }
    else{
        $_SESSION['status'] = "Course unsuccessfully added";
        header('Location: dashboard.php');
    }
}


// UPDATE & EDIT COURSE
if(isset($_POST['update_course']))
{   
    // $key = $_POST['key'];
    $CourseCode = $_POST['CourseCode'];
    $CourseName = $_POST['CourseName'];
    // $notes = $_FILES['notes']['name'];

    $updateData = [
        'CourseCode'=>$CourseCode,
        'CourseName'=>$CourseName,
        // 'notes' =>$notes,
    ];
    
    

    $ref_table = 'Course/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);

    if($updatequery_result)
    {
        $_SESSION['status'] = "Course updated";
        header('Location: dashboard.php');
    }
    else{
        $_SESSION['status'] = "Course not updated";
        header('Location: dashboard.php');
    }
}



// DELETE COURSE
if(isset($_POST['delete_btn']))
{
    $del_id = $_POST['delete_btn'];
    $ref_table = 'Course/'.$del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if($deletequery_result)
    {
        $_SESSION['status'] = "Course deleted";
        header('Location: dashboard.php');
    }
    else{
        $_SESSION['status'] = "Course not deleted";
        header('Location: dashboard.php');
    }
}

//UPLOAD FILES
if(isset($_POST['submit'])){
 
    $countfiles = count($_FILES['notes']['name']);
   
    for($i=0;$i<$countfiles;$i++){
     $filename = $_FILES['notes']['name'][$i];
    
     // Upload file
        $upload_dir = $storage->getBucket('LectureNotes');
        // $storageClient = $storage->getStorageClient();
        // $defaultBucket = $storage->getBucket();
        // $Bucket = $storage->getBucket('LectureNotes/');
        move_uploaded_file($_FILES['notes']['tmp_name'][$i], $upload_dir.'/'.$filename);
    }

} 

//-------------ADMIN COURSE-----------------//

// ADD COURSE
if(isset($_POST['save_course_admin']))
{
    $CourseCode = $_POST['CourseCode'];
    $CourseName = $_POST['CourseName'];
    
    $postData = [
        'CourseCode'=> $CourseCode,
        'CourseName'=> $CourseName,
        
    ];
    
    $ref_table = "Course";
    $postRef_result = $database->getReference($ref_table)->push($postData);

    if($postRef_result){
        $_SESSION['status'] = "Course successfully added";
        header('Location: courselist.php');
    }
    else{
        $_SESSION['status'] = "Course unsuccessfully added";
        header('Location: courselist.php');
    }
}


// UPDATE & EDIT COURSE
if(isset($_POST['update_course_admin']))
{   
    $key = $_POST['key'];
    $CourseCode = $_POST['CourseCode'];
    $CourseName = $_POST['CourseName'];
    $UpdatedBy = $_POST['full_name'];
    

    $updateData = [
        'CourseCode'=>$CourseCode,
        'CourseName'=>$CourseName,
        'UpdatedBy' =>$UpdatedBy,
        
    ];
    
    $ref_table = 'Course/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);

    if($updatequery_result)
    {
        $_SESSION['status'] = "Course updated";
        header('Location: courselist.php');
    }
    else{
        $_SESSION['status'] = "Course not updated";
        header('Location: courselist.php');
    }
}

// DELETE COURSE
if(isset($_POST['delete_btn_admin']))
{
    $del_id = $_POST['delete_btn_admin'];
    $ref_table = 'Course/'.$del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if($deletequery_result)
    {
        $_SESSION['status'] = "Course deleted";
        header('Location: courselist.php');
    }
    else{
        $_SESSION['status'] = "Course not deleted";
        header('Location: courselist.php');
    }
}


   
?>