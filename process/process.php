<?php
session_start();
include_once("../connection/config.php");

if(isset($_POST['signup'])){
    $con = config::connect();
    $username = sanitizeString($_POST['username']);
    $password = sanitizePassword($_POST['password']);
    $name = sanitizeString($_POST['name']);
    $email = sanitizeString($_POST['email']);
    $type = $_POST['type'];
    
    if(empty($username) || empty($password) || empty($name) || empty($email)|| empty($type)){
        return;
    }
    if(!checkUserNameExist($con, $username)){
        echo "Username already exists.";
        return;
    }
    if(!checkEmailExist($con, $email)){
        echo "Email already exists.";
        return;
    }
    
    if(insertDetails($con, $username, $password, $name, $email, $type)){
		$_SESSION['loggedin'] = 1;
        $_SESSION['usersUsername'] = $username;
        $_SESSION['usersName'] = $name;
        header("Location: ../dashboard");
    }
}

if(isset($_POST['login'])){
    $con = config::connect();
    $username = sanitizeString($_POST['username']);
    $password = sanitizePassword($_POST['password']);
    
    if(empty($username) || empty($password)){
        return;
    }
    
   if(checkLogin($con, $username, $password)){
	   $_SESSION['loggedin'] = 1;
       $_SESSION['usersUsername'] = $username;
       header("Location: ../dashboard");
   } else {
       echo "Username/Password are incorrect.";
   }
}

if(isset($_POST['update'])){
    $con = config::connect();
    $username = sanitizeString($_POST['username']);
    $password = sanitizePassword($_POST['password']);
    $name = sanitizeString($_POST['name']);
    $email = sanitizeString($_POST['email']);
    
    if(empty($username) || empty($password) || empty($name) || empty($email)){
        return;
    }
    if(!checkUserNameExist($con, $username)){
        echo "Username already exists.";
        return;
    }
    if(!checkEmailExist($con, $email)){
        echo "Email already exists.";
        return;
    }
    
    $currentUserName = $_SESSION['usersUsername'];
    $query = $con->prepare("SELECT * FROM users WHERE usersUsername=:usersUsername;");
    $query->bindParam(":usersUsername", $currentUserName);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $usersID = $result['usersID'];
    
    if(updateDetails($con, $usersID, $username, $password, $name, $email)){
        $_SESSION['usersUsername'] = $username;
        $_SESSION['usersName'] = $name;
        header("Location: ../dashboard");
    }
}

if(isset($_POST['schedule'])){
    $con = config::connect();
    
    $course = $_POST['course'];
    $cSection = $_POST['cSection'];
    $platform = $_POST['platform'];
    $comment = $_POST['comment'];
    
    $currentUsersID = $_SESSION['usersID'];
    $selectedAvailableID = $_SESSION['availableID'];
    
    scheduleappointment($con, $course, $cSection, $platform, $comment, $currentUsersID, $selectedAvailableID);
    header("Location: ../dashboard");  
}

if(isset($_POST['updateSchedule'])){
    $con = config::connect();
    $course = $_POST['course'];
    $cSection = $_POST['cSection'];
    $platform = $_POST['platform'];
    $comment = $_POST['comment'];
    
    $currentUserID = $_SESSION['usersID'];
    $currentAvailableID = $_SESSION['availableID'];
    
    $query = $con->prepare("SELECT * FROM scheduled_appointment WHERE usersID=:usersID AND availableID=:availableID;");
    $query->bindParam(":usersID", $currentUserID);
    $query->bindParam(":availableID", $currentAvailableID);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $usersID = $result['usersID'];
    $availableID = $result['availableID'];
    
    updateSchedule($con, $course, $cSection, $platform, $comment, $currentUserID, $currentAvailableID);
    header("Location: ../dashboard"); 
}

function insertDetails($con, $username, $password, $name, $email, $type){
    $query = $con->prepare("
                            INSERT INTO users 
                                (usersUsername, usersPassword, usersName, usersEmail, accountID) 
                            VALUES 
                                (:usersUsername, :usersPassword, :usersName, :usersEmail, :type);
                          ");
    $query->bindParam(":usersUsername",$username);
    $query->bindParam(":usersPassword",$password);
    $query->bindParam(":usersName",$name);
    $query->bindParam(":usersEmail",$email);
    $query->bindParam(":type",$type);
    $query->execute();
    $query->closeCursor();
    return $query;
}

function checkLogin($con, $username, $password){
    $query = $con->prepare("SELECT * FROM users WHERE usersUsername=:usersUsername AND usersPassword=:usersPassword;");
    $query->bindParam(":usersUsername",$username);
    $query->bindParam(":usersPassword",$password);
    $query->execute();
    if($query->rowCount() == 1){
        return true;
    } else {
        return false;
    }
}

function sanitizeString($string){
    $string = strip_tags($string);
    $string = str_replace(" ","", $string);
    return $string;
}

function sanitizePassword($string){
    $string = md5($string);
    return $string;
}

function updateDetails($con, $usersID, $username, $password, $name, $email){
    $query = $con->prepare("UPDATE users SET usersUsername=:usersUsername, usersPassword=:usersPassword, usersName=:usersName, usersEmail=:usersEmail
                            WHERE usersID=:usersID;");
    $query->bindParam(":usersUsername", $username);
    $query->bindParam(":usersPassword", $password);
    $query->bindParam(":usersName", $name);
    $query->bindParam(":usersEmail", $email);
    $query->bindParam(":usersID", $usersID);
    return $query->execute();
}

function updateSchedule($con, $course, $cSection, $platform, $comment, $currentUserID, $currentAvailableID){
    $query = $con->prepare("UPDATE scheduled_appointment SET course=:course, cSection=:cSection, platform=:platform, comment=:comment
                            WHERE usersID=:usersID AND availableID=:availableID;");
    $query->bindParam(":course", $course);
    $query->bindParam(":cSection", $cSection);
    $query->bindParam(":platform", $platform);
    $query->bindParam(":comment", $comment);
    $query->bindParam(":usersID", $currentUserID);
    $query->bindParam(":availableID", $currentAvailableID);
    $query->execute();
    return;
}

function checkUserNameExist($con, $username){
    $query = $con->prepare("SELECT * FROM users WHERE usersUsername=:usersUsername;");
    $query->bindParam(":usersUsername", $username);
    $query->execute();
    if ($query->rowCount() == 1){
        return false;
    } else {
        return true;
    }
}

function checkEmailExist($con, $email){
    $query = $con->prepare("SELECT * FROM users WHERE usersEmail=:usersEmail;");
    $query->bindParam(":usersEmail", $email);
    $query->execute();
    if ($query->rowCount() == 1){
        return false;
    } else {
        return true;
    }
}

function scheduleappointment($con, $course, $cSection, $platform, $comment, $currentUsersID, $selectedAvailableID){
    $query = $con->prepare("
                            INSERT INTO scheduled_appointment 
                                (course, cSection, platform, comment, usersID, availableID) 
                            VALUES 
                                (:course, :cSection, :platform, :comment, :usersID, :availableID);
                                
                            UPDATE available_appointment SET available=1 WHERE availableID=:availableID ;
                          ");
    $query->bindParam(":course",$course);
    $query->bindParam(":cSection",$cSection);
    $query->bindParam(":platform",$platform);
    $query->bindParam(":comment",$comment);
    $query->bindParam(":usersID",$currentUsersID);
    $query->bindParam(":availableID",$selectedAvailableID);
    $query->execute();
    $query->closeCursor();
    return $query;
}
?>