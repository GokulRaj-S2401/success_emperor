<?php
include('connection.php');
try
{
    if(isset($_POST['raisedDate']) && isset($_POST['question']) && isset($_POST['raisedBy']) && isset($_POST['createdOn']) && isset($_POST['isActive']) )
    {
        $raisedDate = $_POST['raisedDate'];
        $question = $_POST['question'];
        $raisedBy = $_POST['raisedBy'];
        $createdOn =$_POST['createdOn'];
        $isActive =$_POST['isActive'];

        $stmt =$conn->prepare( "INSERT INTO english_emperor_support (Raised_Date, Question, Raised_By, Created_On, Is_Active) VALUES(?,?,?,?,?)");
        $stmt->bind_param("ssisi", $raisedDate,$question, $raisedBy, $createdOn , $isActive );
        $stmt->execute();
        $result = $stmt->get_result();
        if($result)
        {
            $res=array("status"=>"F","message"=>"Internal server error");
            echo json_encode($res);
        }
        else
        {
            $res=array("status"=>"S","message"=>"Data was stored");
            echo json_encode($res);
        }
    }
    else
    {
        $res=array("status"=>"F","message"=>"All files are required");
        echo json_encode($res);
    }
    $stmt->close();
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$conn->close();
?>