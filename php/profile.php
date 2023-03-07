<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profile";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['name']) || isset($_POST['age']) || isset($_POST['dob']) || isset($_POST['contact']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO profile (name, age, dob, contact)
    VALUES ('$name', '$age', '$dob', '$contact')";

    if (mysqli_query($conn, $sql)) 
    {
        echo "New record created successfully";
    } else 
    {
        echo "Error: ". $sql .<br>  . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>