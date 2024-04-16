<?php
include ('../../../../DB/connection.php');
try{
$id = $_POST['id'];
$stmt = $conn->prepare("SELECT topic_name, price, discount, file_name, category, created_on, isActive FROM english_emperor_notes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if($row = $result->fetch_assoc()){
    $res = array("Topic_name:" . $row['topic_name']. " Price:" . $row['price'] . " Discount:".  $row['discount'] . " File_name:".  $row['file_name'] . " Category:". $row['category'] . " Created on:". $row['created_on'] . " Is Active:". $row['isActive']);
    echo json_encode($res);
}
else{
    $res =  array("status"=>"S", "message"=>"Internal server error.");
    echo json_encode($res);
}
$stmt->close();

}
catch(Exception $e){
    $res = array("status"=>"F", "message"=>"Internal server error.");
    echo json_encode($res);
}
$conn->close();

?>