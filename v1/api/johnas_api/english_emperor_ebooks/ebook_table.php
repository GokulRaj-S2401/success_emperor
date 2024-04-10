<?php
include('../../../../DB/connection.php');
try{
    if(isset($_POST['book_name']) && isset($_POST['created_on']) && isset($_POST['created_by']) && isset($_POST['price']) && isset($_POST['offer']) && isset($_POST['category'])){
$stmt = $conn->prepare("INSERT INTO english_emperor_ebooks (book_name, created_on, created_by, price, offer, category) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $book_name, $created_on, $created_by, $price, $offer, $category);
$book_name = $_POST['book_name'];
$created_on = $_POST['created_on'];
$created_by = $_POST['created_by'];
$price = $_POST['price'];
$offer = $_POST['offer'];
$category = $_POST['category'];

if($stmt->execute()){
    $res = array("status"=>"S", "message"=>"Inserted successfully");
    echo json_encode($res);
}
}
else{
    $res = array("status"=>"F", "message"=>"Fields required topic name, price, discount, file name, category, created on.");
    echo json_encode($res);
}
$stmt->close();
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$conn->close();


?>