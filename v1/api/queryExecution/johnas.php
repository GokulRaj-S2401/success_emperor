<?php
include('../../../DB/connection.php');

$sql = "CREATE TABLE english_emperor_notes (
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

<?php
include('../../../DB/connection.php');

//english_emperor_ebook_purchase

$sql = "CREATE TABLE english_emperor_ebook_purchase (
    id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    book_name VARCHAR(50) NOT NULL,
    created_on VARCHAR(10) NOT NULL,
    created_by VARCHAR(10) NOT NULL,
    price VARCHAR(10) NOT NULL,
    offer VARCHAR(10) NOT NULL,
    category VARCHAR(50) NOT NULL,
    issuerid INT(100) NOT NULL,
    issuer_issued_date VARCHAR(10) NOT NULL,
    isActive INT(1) NOT NULL
) AUTO_INCREMENT=1";

if ($conn->query($sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

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

