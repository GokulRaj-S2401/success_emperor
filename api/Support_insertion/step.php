<?php
include("connection.php");

$sql = "CREATE TABLE english_emperor_support (
    Support_Id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY  ,
    Raised_Date VARCHAR(30) NOT NULL,
    Question VARCHAR(1000) NOT NULL,
    Raised_By INT(50) NOT NULL,
    Created_On VARCHAR(50) NOT NULL,
    Is_Active INT(50) NOT NULL

) AUTO_INCREMENT=1";

if ($conn->query($sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>