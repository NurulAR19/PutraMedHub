<?php
session_start();
include('dbcon.php');

use Firebase\Auth\Token\Exception\InvalidToken;

if(isset($_SESSION['verified_user_id']))
{
    $uid = $_SESSION['verified_user_id'];
    $idTokenString =  $_SESSION['idTokenString'];

    try {
        $verifiedIdToken = $auth->verifyIdToken($idTokenString);
        // echo "Working";
    } catch (InvalidToken $e) {
        // echo 'The token is invalid: '.$e->getMessage();
        $_SESSION['expiry_status']= "Token expired or invalid. Login again.";
        header('Location: sign-out.php');
        exit();
    } catch (\InvalidArgumentException $e) {
        echo 'The token could not be parsed: '.$e->getMessage();
        $_SESSION['expiry_status']= "Token expired or invalid. Login again.";
        header('Location: sign-out.php');
        exit();
    }

}
else
{
    $_SESSION['status']= "Please login to access this page";
    header('Location: sign-in.php');
    exit();
}


?>