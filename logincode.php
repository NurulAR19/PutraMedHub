<?php
session_start();
include('dbcon.php');

use Firebase\Auth\Token\Exception\InvalidToken;


// SIGN IN
if(isset($_POST['login_btn']))
{
    $email = $_POST['email'];
    $clearTextPassword = $_POST['password'];

    try 
    {
        $user = $auth->getUserByEmail("$email");

        try{
            $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
           
            $idTokenString = $signInResult->idToken();

            try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                /** @var \Lcobucci\JWT\Token\Plain $verifiedIdToken */
                $uid = $verifiedIdToken->claims()->get('sub');


                $claims = $auth->getUser($uid)->customClaims;
                if(isset($claims['admin']) == true)
                {
                    $_SESSION['verified_admin'] = true;
                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;
                    $_SESSION['status']= "Logged in successful";
                    header('Location: home.php');
                    exit();
                }
                elseif(isset($claims['editor']) == true)
                {
                    $_SESSION['verified_editor'] = true;
                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;
                    $_SESSION['status']= "Logged in successful";
                    header('Location: dashboard.php');
                    exit();
                }
                elseif(isset($claims['viewer']) == true)
                {
                    $_SESSION['verified_viewer'] = true;
                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;
                    $_SESSION['status']= "Logged in successful";
                    header('Location: main.php');
                    exit();
                }
                elseif($claims == null)
                {
                    
                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;
                    $_SESSION['status']= "Logged in successful";
                    header('Location: main.php');
                    exit();
                }

                // $_SESSION['status']= "Logged in successful";
                // header('Location: home.php');
                // exit();
       

            } catch (InvalidToken $e) {
                echo 'The token is invalid: '.$e->getMessage();
            } catch (\InvalidArgumentException $e) {
                echo 'The token could not be parsed: '.$e->getMessage();
            }
        }
        
        catch(Exception $e)
        {
            $_SESSION['status']= "Invalid email address or password";
            header('Location: sign-in.php');
            exit();
        }
    } 
    
    catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) 
    {
        // echo $e->getMessage();

         $_SESSION['status']= "Invalid account or password";
        header('Location: sign-in.php');
        exit();
    }
}

else
{
    $_SESSION['status'] = "Not allowed";
    header('Location: sign-in.php');
    exit();
}


?>