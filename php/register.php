<?php

// connect to Redis
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// connect to MongoDB
$mongo = new MongoClient();
$db = $mongo->selectDB("mydb");
$collection = $db->selectCollection("users");

// get username and password from POST
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// save the user in Redis
$redis->set($username, $hashedPassword);


// save the user in MongoDB
$user = array("username" => $username);
$collection->insert($user);
$email = array("email" => $email);
$collection->insert($email);

// redirect to the home page
header("Location: index.html");
exit;

?>