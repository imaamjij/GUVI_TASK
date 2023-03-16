<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// connect to MongoDB
$mongo = new MongoClient();
$db = $mongo->selectDB("mydb");
$collection = $db->selectCollection("users");

// get username and password from POST
$username = $_POST['username'];
$password = $_POST['password'];

// check if user exists in Redis
if ($redis->exists($username)) {
  // get the hashed password from Redis
  $hashedPassword = $redis->get($username);
  
  // verify the password
  if (password_verify($password, $hashedPassword)) {
    // authentication successful, get the user details from MongoDB
    $user = $collection->findOne(array("username" => $username));
    
    // save the user details in the session
    $_SESSION['user'] = $user;
    
    // redirect to the home page
    header("Location:index.html");
    exit;
  }
}

// authentication failed, redirect to login page
header("Location: login.php");
exit;

?>