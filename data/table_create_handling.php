<?php
$data = $_POST["data"];
$action = $_POST["action"];

$servername = "localhost:3306";
$username = "root";
$password = "vXrbFqkB";
$dbname = "accounts";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "";

if ($action == "add") {
    $data_decoded = json_decode($data);
    $tabname = $data_decoded->name;
    
    $sql = "CREATE TABLE $tabname (accounticon TEXT(1000), accountcategory TEXT(1000), accountname TEXT(1000), accountaddress TEXT(1000), accountusername TEXT(1000), accountpassword TEXT(1000))";
}
elseif ($action == "delete") {
    $data_decoded = json_decode($data);
    $tabname = $data_decoded->name;

    $sql = "DROP TABLE $tabname";
}
elseif ($action == "edit") {
    $data_decoded = json_decode($data);
    $tabtarget = $data_decoded->target;
    $tabname = $data_decoded->name;

    $sql = "ALTER TABLE $tabtarget RENAME $tabname";
}

$conn->query($sql);
  
$conn->close();
?>