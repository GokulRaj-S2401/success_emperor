<?php
include('../../../DB/connection.php');

//english_emperor_ebooks

$sql = "CREATE TABLE english_emperor_ebooks (
    id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    book_name VARCHAR(50) NOT NULL,
    created_on VARCHAR(10) NOT NULL,
    created_by VARCHAR(10) NOT NULL,
    price VARCHAR(10) NOT NULL,
    offer VARCHAR(10) NOT NULL,
    category VARCHAR(50) NOT NULL
) AUTO_INCREMENT=1";

if ($conn->query($sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>