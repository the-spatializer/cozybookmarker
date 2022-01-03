<?php
$inputpassword = $_POST["password"];

$servername = "localhost:3306";
$username = "root";
$password = "vXrbFqkB";
$dbname = "accounts";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function change_quote($input) {
    return '"' . $input . '"';
}

$inputpassword = change_quote($inputpassword);

$sql = "INSERT INTO security (masterpassword) VALUE ($inputpassword)";

$conn->query($sql);

$conn->close();
?>