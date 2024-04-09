<?php
include("../../../DB/connection.php");

//english_emperor_support

$sql = "CREATE TABLE english_emperor_support (
    Support_Id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY  ,
    Raised_Date VARCHAR(30) NOT NULL,
    Question VARCHAR(1000) NOT NULL,
    Raised_By INT(50) NOT NULL,
    Created_On VARCHAR(50) NOT NULL,
    Is_Active INT(50) NOT NULL

) AUTO_INCREMENT=1";

if ($conn->query($sql)) {
    echo "english_emperor_support table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<?php
include("../../../DB/connection.php");

//english_emperor_user

$sql = "CREATE TABLE english_emperor_user (
    Id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY  ,
    Email VARCHAR(30) NOT NULL,
    User_Name VARCHAR(30) NOT NULL,
    Phone_Number VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Is_Active VARCHAR(50) NOT NULL
) AUTO_INCREMENT=1001";

if ($conn->query($sql)) {
    echo "english_emperor_user table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>


