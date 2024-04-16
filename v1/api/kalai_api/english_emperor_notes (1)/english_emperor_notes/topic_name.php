<?php
include('../../../../DB/connection.php');
try{

// Upload PDF Section

    $base64Data = $_POST['data'];

    $fileContent = base64_decode($base64Data);
    if ($fileContent === false) {
        $res = array("status"=>"F","message"=>"Error: Base64 decoding failed");
        echo json_encode($res);
    }
    $uploadDirectory = 'uploads/';   
    $file_name = basename($_POST['file_name'] . '.pdf');
    $filePath = $uploadDirectory . $file_name;

    // Check if file is saved successfully
    if (file_exists($filePath)) {
        $res = array("status"=>"F","message"=>"FileName Already Exist");
        echo json_encode($res);
    } else {
        //For Write content to file
        if (file_put_contents($filePath, $fileContent) === false) {
            $res = array("status"=>"F","message"=>"Error: Failed to write to file");
            echo json_encode($res);
        }else{
            $res = array("status"=>"S","message"=>"File Saved Successfully");
            echo json_encode($res); 
        }
        if(isset($_POST['topic_name']) && isset($_POST['price']) && isset($_POST['discount']) && isset($_POST['file_name']) && isset($_POST['category']) && isset($_POST['created_on']) &&  isset($_POST['data'])){
            $isActive = 1;
            $stmt = $conn->prepare("INSERT INTO english_emperor_notes (topic_name, price, discount, file_name, category, created_on, isActive) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssi", $topic_name, $price, $discount, $file_name, $category, $created_on, $isActive);
            $stmt2 = $conn->prepare("INSERT INTO english_emperor_ebooks(book_name) VALUES (?)");
            $stmt2->bind_param("s", $file_name);
            $topic_name = $_POST['topic_name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $category = $_POST['category'];
            $created_on = $_POST['created_on'];
            $isActive = $_POST['isActive'];
        }
        else{
            $res = array("status"=>"F", "message"=>"Fields requires topic name, price, discount, file name, category, created on.");
            echo json_encode($res);
        }
        $stmt->close();
    }
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$conn->close();


?>
