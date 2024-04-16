<?php
include('../../../../DB/connection.php');

try{
    $base64Data = $_POST['data']; 
    if (!isset($base64Data)) {
        $res = array("status"=>"F","message"=>"Error: No data found in request body");
        echo json_encode($res);
    }
    
    $fileContent = base64_decode($base64Data);
    if ($fileContent === false) {
        $res = array("status"=>"F","message"=>"Error: Base64 decoding failed");
        echo json_encode($res);
    }
    $uploadDirectory = 'uploads/';   
    $filename = basename($_POST['name'] . '.pdf');
    $filePath = $uploadDirectory . $filename;

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
    }
}
catch(Exception $e){
    echo "Internel Server Error" . $e->getMessage();
}
    
?>