<?php
$servername = "localhost:3306";
$username = "root";
$password = "vXrbFqkB";
$dbname = "accounts";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT masterpassword FROM security";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["masterpassword"];
    }
}

$conn->close();
?>