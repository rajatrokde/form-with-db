<?php
$servername = "localhost";
$username = "root";
$password = "rajat";
$dbname = "contact_form_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO submissions (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully you will get update soon";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
