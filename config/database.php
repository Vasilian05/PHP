<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'alex');
define('DB_PASS', '123');
define('DB_NAME', 'feedback');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conn->connect_error) {
    die('Connection Failed' . $conn -> connection_error);
}
echo 'Connected!';


    // $name = $_REQUEST['name'];
    // $email = $_REQUEST['email'];
    // $body = $_REQUEST['feedback'];

    // $sql = "INSERT INTO feedback_table VALUES ('$name', '$email', '$body')"
?>