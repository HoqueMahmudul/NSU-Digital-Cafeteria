<?php
//This Pages controls all management
session_start();
require "connection.php";
$errors = array();
//User Registeration
if (isset($_POST['UserRegister'])) {

    $UserName = mysqli_real_escape_string($con, $_POST['UserName']);
    $NsuEmail = mysqli_real_escape_string($con, $_POST['NsuEmail']);
    $NsuId = mysqli_real_escape_string($con, $_POST['NsuId']);
    $ContactNumber = mysqli_real_escape_string($con, $_POST['ContactNumber']);
    $UserPassword = mysqli_real_escape_string($con, $_POST['UserPassword']);
    $ConfirmUserPassword = mysqli_real_escape_string($con, $_POST['ConfirmUserPassword']);
   //check for username that is already in used or not
    $UserNameQuery = "SELECT * FROM users_tb  WHERE UserName = '$UserName'";
    $ResultUserName = mysqli_query($con, $UserNameQuery);
    //check for NSU that is already in used or not
    $NsuIdQuery = "SELECT * FROM users_tb  WHERE NsuId = '$NsuId'";
    $ResultNsuIdQuery = mysqli_query($con, $NsuIdQuery);
    //Display Error Messages 
    if (mysqli_num_rows($ResultUserName) > 0) {
        $errors['UserName'] = "UserName  that you have entered is already used.";
        if (mysqli_num_rows($ResultNsuIdQuery) > 0)
        $errors['NsuId'] = "NsuId  that you have entered is already used.";
        if ($UserPassword !== $ConfirmUserPassword)
                $errors['UserPassword'] = "Password does't matched.";
    }
    else if($UserPassword !== $ConfirmUserPassword){
        $errors['UserPassword'] = "Password does't matched.";
        if (mysqli_num_rows($ResultNsuIdQuery) > 0)
        $errors['NsuId'] = "NsuId  that you have entered is already used.";
    }
   elseif(mysqli_num_rows($ResultNsuIdQuery) > 0)
       $errors['NsuId'] = "NsuId  that you have entered is already used.";
    else{
        //if user fill valid information 
        //applying hashing on password
        $UserPassword = password_hash($UserPassword, PASSWORD_BCRYPT);
        $InsertQuery = " INSERT INTO `users_tb` 
        (`Id`, `UserName`, `NsuEmail`, `NsuId`, `ContactNumber`, `Password`)
              VALUES (NULL, '$UserName', '$NsuEmail', '$NsuId', '$ContactNumber', '$UserPassword')";
        $CheckQuery = mysqli_query($con, $InsertQuery);

        if ($CheckQuery) {
                $_SESSION['NsuId'] = $NsuId;
                $_SESSION['password'] = $UserPassword;
                header("location: Home.php");
        } else {
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
}
// User Login 
if (isset($_POST['Login'])) {
    
    $NsuId = mysqli_real_escape_string($con, $_POST['NsuId']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_NsuId = "SELECT * FROM users_tb WHERE NsuId = '$NsuId'";
    //check your are member 
    $res = mysqli_query($con, $check_NsuId);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        //password hash for matching in database (because password stored in database before applying hash)
        $fetch_pass = $fetch['Password'];
        if (password_verify($password, $fetch_pass)) {
                $_SESSION['Id'] = $fetch['Id'];
                $_SESSION['NsuId'] = $fetch['NsuId'];
                $_SESSION['password'] = $fetch['Password'];
                header("location: Home.php");
        } else {
            $errors['error'] = "Incorrect id or password!";
        }
    } else {
        $errors['error'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}

