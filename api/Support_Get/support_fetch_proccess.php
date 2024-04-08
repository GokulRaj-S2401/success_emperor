<?php
include("connection.php");

try 
{
    $stmt = $conn->prepare("SELECT * from english_emperor_support ORDER BY Raised_Date ASC");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) 
    {
        while ($row = $result->fetch_assoc()) 
        {
            $res=array("status"=>"S","Data"=>$row);
            echo json_encode($res);
        } 
    }
    $stmt->close();
} 
catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
