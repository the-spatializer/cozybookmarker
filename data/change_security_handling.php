<?php
$oldpassword = $_POST["oldpassword"];
$newpassword = $_POST["newpassword"];

$servername = "localhost:3306";
$username = "root";
$password = "vXrbFqkB";
$dbname = "accounts";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function change_quote($new) {
    return '"' . $new . '"';
}

$oldpassword = change_quote($oldpassword);
$newpassword = change_quote($newpassword);

$sql = "UPDATE security SET masterpassword=$newpassword WHERE masterpassword=$oldpassword";

$conn->query($sql);

$conn->close();
?>