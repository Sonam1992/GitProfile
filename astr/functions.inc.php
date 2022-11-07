<?php

require 'dbh.inc.php';

function emptyInputSignup($name,$email,$pwd,$pwdrepeat,$emp_id){
    $result;
    if (empty($name)|| empty($email)|| empty($pwd)|| empty($pwdrepeat)|| empty($emp_id) ){
    $result = true;
    }
    else
    {
        $result=false;
    }
    return $result;
}


function invalidUid($emp_id){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/",$emp_id)){
    $result = true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

function invalidemail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $result = true;
    } 
    else
    {
        $result=false;
    }
    return $result;
}

function pwdMatch($pwd,$pwdrepeat){
    $result;
    if ($pwd !== $pwdrepeat){
    $result = true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

function uidExists($conn,$emp_id,$email){
    $sql = "SELECT * FROM user where userEmpId = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=queryfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$emp_id,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else
    {
        $result = false;
        return false;
    }

    mysqli_stmt_close($stmt);
}



function createuser($conn,$name,$email,$pwd,$pwdrepeat,$emp_id) {
    $sql = "INSERT INTO user (userName,userEmail,userEmpId,userPassword) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=queryfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$emp_id,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
        exit();
    
}

function emptycreds($username,$pwd){
    $result;
    if (empty($username)|| empty($pwd)){
    $result = true;
    }
    else
    {
        $result=false;
    }
    return $result;
}


function loginUser($conn,$username,$pwd){
    $uidExsists = uidExists($conn,$username,$pwd);

    if ($uidExsists === false) {
        header("location:signin.php?error=Notfound#SignIn");
        exit();
    }

    $pwdHashed = $uidExsists["userPassword"];

    $checkPwd = password_verify($pwd,$pwdHashed);

    if ($checkPwd === false) {
        header("location:signin.php?error=loginfailed#SignIn");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExsists["userId"];
        $_SESSION["userEmpId"] = $uidExsists["userEmpId"];
        $_SESSION["start"] = time();
        $_SESSION["expire"] = $_SESSION["start"]+(480*60);
        header("location: index.php?error=Loggedin");
        exit();
        
        // $_SESSION["auth"] = true;
        // $_SESSION["start"] = time();
        // $_SESSION["expire"] = $_SESSION["start"]+(40*60);
        // header("location: ../index.php");
        // exit();

    }
}

if(isset($_REQUEST['logout'])){
    session_destroy();
    header("Location: signin.php");
    exit();
}


    // function loadAuthors(){
    //     $db = new DbConnect;
    //     $conn = $db->connect();

    //     $stmt = $conn->prepare("select * from main_task;");
    //     $stmt->execute();
    //     $aurthor = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $aurthor;
    // }


    // if(isset($_POST['aid'])){
    //     $db = new DbConnect;
    //     $conn = $db->connect();

    //     $stmt = $conn->prepare("select * from department where m_id = " . $_POST['aid']);
    //     $stmt->execute();
    //     $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     // return $books;
    //     echo json_encode($books);
    // }


