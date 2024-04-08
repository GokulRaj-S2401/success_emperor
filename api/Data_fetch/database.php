<?php
include('connection.php');

$sql = "CREATE TABLE Success_emperor_notes (
    Id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    topic_name VARCHAR(50) NOT NULL,
    price INT(50) NOT NULL,
    discount INT(50) NOT NULL,
    file_name VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    created_on VARCHAR(50) NOT NULL,
    isActive INT(2)
) AUTO_INCREMENT=1";

if ($conn->query($sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>