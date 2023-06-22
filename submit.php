<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$address = $_POST['address'];
// DataBase Connection
$conn = new mysqli('localhost', 'root', '', 'constructo');
if($conn->connect_error){
    die('Connection Failed: '. $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into first(firstName, lastName, email, address, timing) values(?, ?, ?, ?,  current_timestamp())");
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $address);
    $stmt->execute();
    echo "Resistration Successfully..";
    $stmt-> close();
    $conn-> close();

}
?>