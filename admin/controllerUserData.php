<?php
session_start();
require "connection.php";
require 'vendor/autoload.php'; 
use SendGrid\Mail\Mail;
use SendGrid\Mail\From;
use SendGrid\Mail\To;
use SendGrid\Mail\Subject;
use SendGrid\Mail\PlainTextContent;


$email = "";
$name = "";
$errors = array();

if (!isset($_SESSION['failed_attempts'])) {
    $_SESSION['failed_attempts'] = 0;
}

if (!isset($_SESSION['last_attempt_time'])) {
    $_SESSION['last_attempt_time'] = 0;
}

$lockout_time = 20; // 20 seconds

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

// define password criteria
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$symbol = preg_match('@[^\w]@', $password);
$length = strlen($password) >= 8;

// check if passwords match
if($password !== $cpassword){
    $errors['password'] = "Confirm password not matched!";
}

// check if password meets criteria
if(!$uppercase || !$lowercase || !$number || !$symbol || !$length){
    $errors['password'] = "Password should have at least 8 characters, one uppercase letter, one lowercase letter, one number, and one symbol!";
}

    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            
        //     $sendgrid = new SendGrid('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');
    
        //     $mail = new Mail();
        //     $mail->setFrom(new From('abhiadk0330@gmail.com', 'abhiadk'));
        //     $mail->addTo(new To($email, $name));
        //     $mail->setSubject(new Subject("Email Verification Code"));
        //     $mail->addContent(new PlainTextContent("Your verification code is $code"));
    
        //     try {
        //         $response = $sendgrid->send($mail);
        //         if ($response->statusCode() == 202) {
        //             $info = "We've sent a verification code to your email - $email";
        //             $_SESSION['info'] = $info;
        //             $_SESSION['email'] = $email;
        //             $_SESSION['password'] = $password;
                    //  header('location: user-otp.php');
        //             exit();
        //         } else {
        //             $errors['otp-error'] = "Failed while sending code!";
        //         }
        //     } catch (Exception $e) {
        //         $errors['otp-error'] = "Failed while sending code! Error: " . $e->getMessage();
        //     }
        // }else{
        //     $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
    
}

    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    //login limit
    if (isset($_POST['login'])) {
        $current_time = time();
        if ($_SESSION['failed_attempts'] >= 3 && ($current_time - $_SESSION['last_attempt_time']) <= $lockout_time) {
            $errors['locked'] = "You have entered 3 consecutive the wrong password. Do wait for 20 seconds. ";
        } else {
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $check_email = "SELECT * FROM usertable WHERE email = '$email' AND role = 'Administrator'";
            $res = mysqli_query($con, $check_email);
            if (mysqli_num_rows($res) > 0) {
                $fetch = mysqli_fetch_assoc($res);
                $fetch_pass = $fetch['password'];
                if (password_verify($password, $fetch_pass)) {
                    $_SESSION['failed_attempts'] = 0;
                    $_SESSION['email'] = $email;
                    $status = $fetch['status'];
                    if ($status == 'verified') {
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        header('location: home.php');
                    } else {
                        $info = "It looks like you haven't verified your email yet - $email";
                        $_SESSION['info'] = $info;
                        header('location: user-otp.php');
                    }
                } else {
                    $_SESSION['failed_attempts'] += 1;
                    $_SESSION['last_attempt_time'] = $current_time;
                    $errors['email'] = "Incorrect email or password!";
                }
            } else {
                $errors['email'] = "You are not authorized to login as you are subscriber";
            }
        }
    }
    


    //if user click continue button in forgot password form
    if (isset($_POST['check-email'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
    
        if (mysqli_num_rows($run_sql) > 0) {
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
    
            if ($run_query) {
                
                $sendgrid = new SendGrid('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');
    
                $mail = new Mail();
                $mail->setFrom(new From('yugalshrestha@gmail.com', 'yugalstha'));
                $mail->addTo(new To($email, $name));
                $mail->setSubject(new Subject("Password Reset Code"));
                $mail->addContent(new PlainTextContent("Your password reset code is $code"));
    
                try {
                    $response = $sendgrid->send($mail);
                    if ($response->statusCode() == 202) {
                        $info = "We've sent a password reset OTP to your email - $email";
                        $_SESSION['info'] = $info;
                        $_SESSION['email'] = $email;
                        header('location: reset-code.php');
                        exit();
                    } else {
                        $errors['otp-error'] = "Failed while sending code!";
                    }
                } catch (Exception $e) {
                    // $errors['otp-error'] = "Failed while sending code! Error: " . $e->getMessage();
                }
            } else {
                $errors['db-error'] = "Something went wrong!";
            }
        } else {
            $errors['email'] = "This email address does not exist!";
        }
    }
    
    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
    
?>
