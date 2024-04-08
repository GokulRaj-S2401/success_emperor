<?php
include('connection.php');
try{
    if(isset($_POST['topic_name']) && isset($_POST['price']) && isset($_POST['discount']) && isset($_POST['file_name']) && isset($_POST['category']) && isset($_POST['created_on']))
    {
        $isActive = $_POST['isActive'] ?? 1;
        $stmt = $conn->prepare("INSERT INTO success_emperor_notes (topic_name, price, discount, file_name, category, created_on, isActive) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siisssi", $topic_name, $price, $discount, $file_name, $category, $created_on, $isActive);
        $topic_name = $_POST['topic_name'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $file_name = $_POST['file_name'];
        $category = $_POST['category'];
        $created_on = $_POST['created_on'];
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0)
        {
            $res = array("status"=>"F", "message"=>"Internal server error");
            echo json_encode($res);
        }
        else
        {
        $res = array("status"=>"S", "message"=>"Inserted Successfully");
        echo json_encode($res);
        }
    }
    else{
    $res = array("status"=>"F", "message"=>"All fields are required.");
    echo json_encode($res);
}
$stmt->close();
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$conn->close();


?>
