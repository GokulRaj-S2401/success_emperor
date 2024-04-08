<?php
include ('connection.php');
try{
$id = $_POST['id'];
$stmt = $conn->prepare("SELECT topic_name, price, discount, file_name, category, created_on,isActive FROM success_emperor_notes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($topic_name, $price, $discount, $file_name, $category, $created_on, $isActive);

if($stmt->fetch()){
    $res = array("Topic name:".$topic_name, "Price:".$price, "Discount:".$discount, "File name:".$file_name, "Category:".$category, "Created on:".$created_on, "Is Active:".$isActive);
    echo json_encode($res);
}
else{
    $res =  array("status"=>"F", "message"=>"Internal server error.");
    echo json_encode($res);
}
$stmt->close();
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$conn->close();

?>