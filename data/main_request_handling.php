<?php
$servername = "localhost:3306";
$username = "root";
$password = "vXrbFqkB";
$dbname = "accounts";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT tabname, tabtitle, tabicon FROM main";
$result = $conn->query($sql);

$result_array = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $result_json = array("name"=>$row["tabname"], "title"=>$row["tabtitle"], "icon"=>$row["tabicon"]);
        $result_array[] = $result_json;
    }
}

$result_array_json = json_encode($result_array);

echo $result_array_json;

$conn->close();
?>