<?php
include('connection.php');
try
{
    if(isset($_POST['email']) && isset($_POST['userName']) && isset($_POST['phoneNo']) && isset($_POST['password']) && isset($_POST['isActive']) )
    {
        $email = $_POST['email'];
        $userName = $_POST['userName'];
        $phoneNo = $_POST['phoneNo'];
        $password =$_POST['password'];
        $isActive =$_POST['isActive'];

        $stmt =$conn->prepare( "INSERT INTO english_emperor_user (Email, User_Name, Phone_Number,Password,Is_Active) VALUES(?,?,?,?,?)");
        $stmt->bind_param("ssisi", $email,$userName, $phoneNo, $password , $isActive );
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