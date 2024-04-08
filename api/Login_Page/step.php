<?php
include("connection.php");

$sql = "CREATE TABLE english_emperor_user (
    Id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY  ,
    Email VARCHAR(30) NOT NULL,
    User_Name VARCHAR(30) NOT NULL,
    Phone_Number VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Is_Active VARCHAR(50) NOT NULL
) AUTO_INCREMENT=1001";

if ($conn->query($sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
