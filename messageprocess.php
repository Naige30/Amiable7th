<?php
require_once "db.php";

$name=trim($_POST["name"]??"");
$email=trim($_POST["email"]??"");
$message=trim($_POST["message"]??"");

if($name== ""|| $email== ""|| $message== ""){
    $statusMessage="Please Complete All Fields.";
}
else{
    $stmt=$conn->prepare(
        "INSERT INTO messages(name,email,message)VALUES(?,?,?)");

        $stmt->bind_param("sss", $name, $email,$message);

        if($stmt->execute()){
            $statusMessage="Message Sent";
        }
        else{
            $statusMessage= "ERROR". $stmt->error;
        }
        $stmt->close(); 
}

$conn->close();
header("Location: about.php?status=" . urlencode($statusMessage));
exit;
?>