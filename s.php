<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="database112";



$conn=mysqli_connect($server_name,$username,$password,$database_name);
// now check the connection
if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}

if(isset($_POST['save']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_no  = $_POST['phone_no'];
    $location=$_POST['location'];
    $person = $_POST['person'];
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];

    $sql_query = "INSERT INTO entry_details (first_name, last_name, email, phone_no, location, person, arrival, departure) VALUES('$first_name','$last_name', '$email', '$phone_no', '$location', '$person',  '$arrival','$departure')";

    if (mysqli_query($conn,$sql_query))
    {
        echo "<h2>Your Booking has been confirmed!<br> Thank You for visiting....</h2>";
	header('location: thanku.html');
    }
    else
    {
        echo "Error:" . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>