<h1>Hello balenaCloud!</h1>
<h4>Attempting MySQL connection from php...</h4>
<?php
$host = 'mysql';
$user = 'otherUser';
$pass = 'password';
$db = "dbtest";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL successfully!";
}

?>