<?php
$username=$_POST['username'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=$_POST['password'];
$number=$_POST['number'];

$conn = new mysqli('localhost','root','','test');
$Select = "SELECT email FROM registration WHERE email=? limit 1";
$sql= "INSERT INTO registration(username, gender, email, password, number) VALUES(?, ?, ?, ?, ?)";
$stmt = $conn->prepare($Select);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$stmt->fetch();
$rnum = $stmt->num_rows;
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    if($rnum==0){
        $stmt->close();

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi",$username, $gender, $email, $password, $number);
        if($stmt->execute()){
            echo "<h1>Thank you for Signing-up with us..<br> Login to continue...</h2>";
        }
        else{
            echo $stmt->error;
        }
    }
    else{
        echo "<h1>someone already registers using this email</h1>";
     }

     $stmt->close();
     $conn->close();
}
   
?>