<?php
$target = $_POST["target"];

$servername = "localhost:3306";
$username = "root";
$password = "vXrbFqkB";
$dbname = "accounts";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT accounticon, accountcategory, accountname, accountaddress, accountusername, accountpassword FROM $target";
$result = $conn->query($sql);

$result_array = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $result_json = array("icon"=>$row["accounticon"], "category"=>$row["accountcategory"], "name"=>$row["accountname"], "address"=>$row["accountaddress"], "username"=>$row["accountusername"], "password"=>$row["accountpassword"]);
        $result_array[] = $result_json;
    }
}

$result_array_json = json_encode($result_array);

echo $result_array_json;

$conn->close();
?>