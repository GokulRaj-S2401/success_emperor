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
    $book_name = basename($_POST['book_name'] . '.pdf');
    $filePath = $uploadDirectory . $book_name;

    // Check if file is saved successfully
    if (file_exists($filePath)) {
        $res = array("status"=>"F","message"=>"FileName Already Exist");
        echo json_encode($res);
        
    } 
    else 
    {
        //For Write content to file
        if (file_put_contents($filePath, $fileContent) === false) {
            $res = array("status"=>"F","message"=>"Error: Failed to write to file");
            echo json_encode($res);
        }else{
            $res = array("status"=>"S","message"=>"File Saved Successfully");
            echo json_encode($res); 
        }
        if(isset($_POST['book_name']) && isset($_POST['created_on']) && isset($_POST['created_by']) && isset($_POST['price']) && isset($_POST['offer']) && isset($_POST['category'])){
            $stmt = $conn->prepare("INSERT INTO english_emperor_ebooks (book_name, created_on, created_by, price, offer, category) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $book_name, $created_on, $created_by, $price, $offer, $category);
            // $book_name = $_POST['book_name'];
            $created_on = $_POST['created_on'];
            $created_by = $_POST['created_by'];
            $price = $_POST['price'];
            $offer = $_POST['offer'];
            $category = $_POST['category'];
        }
        else{
            $res = array("status"=>"F", "message"=>"Fields required topic name, price, discount, file name, category, created on.");
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