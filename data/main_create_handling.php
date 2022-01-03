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

function change_quote($input) {
    return '"' . $input . '"';
}

$sql = "";

if ($action == "add") {
    $data_decoded = json_decode($data);
    $tabicon = change_quote($data_decoded->icon);
    $tabname = change_quote($data_decoded->name);
    $tabtitle = change_quote($data_decoded->title);
    
    $sql = "INSERT INTO main (tabname, tabtitle, tabicon) VALUES ($tabname, $tabtitle, $tabicon)";
}
elseif ($action == "delete") {
    $data_decoded = json_decode($data);
    $tabtitle = change_quote($data_decoded->title);

    $sql = "DELETE FROM main WHERE tabtitle=$tabtitle";
}
elseif ($action == "edit") {
    $data_decoded = json_decode($data);
    $tabtarget = change_quote($data_decoded->target);
    $tabicon = change_quote($data_decoded->icon);
    $tabname = change_quote($data_decoded->name);
    $tabtitle = change_quote($data_decoded->title);

    $sql = "UPDATE main SET tabname=$tabname, tabtitle=$tabtitle, tabicon=$tabicon WHERE tabname=$tabtarget";
}

$conn->query($sql);
  
$conn->close();
?>