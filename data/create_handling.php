<?php
$data = $_POST["data"];
$target = $_POST["target"];
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
    $accounticon = change_quote($data_decoded->icon);
    $accountcategory = change_quote($data_decoded->category);
    $accountname = change_quote($data_decoded->name);
    $accountaddress = change_quote($data_decoded->address);
    $accountusername = change_quote($data_decoded->username);
    $accountpassword = change_quote($data_decoded->password);
    
    $sql = "INSERT INTO $target (accounticon, accountcategory, accountname, accountaddress, accountusername, accountpassword)
    VALUES ($accounticon, $accountcategory, $accountname, $accountaddress, $accountusername, $accountpassword)";
}
elseif ($action == "delete") {
    $data_decoded = change_quote($data);
    $sql = "DELETE FROM $target WHERE accountname=$data_decoded";
}
elseif ($action == "edit") {
    $data_decoded = json_decode($data);
    $accounttarget = change_quote($data_decoded->target);
    $accounticon = change_quote($data_decoded->icon);
    $accountcategory = change_quote($data_decoded->category);
    $accountname = change_quote($data_decoded->name);
    $accountaddress = change_quote($data_decoded->address);
    $accountusername = change_quote($data_decoded->username);
    $accountpassword = change_quote($data_decoded->password);

    $sql = "UPDATE $target SET accounticon=$accounticon, accountcategory=$accountcategory, accountname=$accountname, accountaddress=$accountaddress, accountusername=$accountusername, accountpassword=$accountpassword WHERE accountname=$accounttarget";
}

$conn->query($sql);
  
$conn->close();
?>