<?php
include("connection.php");
try
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $stmt = $conn->prepare("SELECT Id,  User_Name, Phone_Number, Is_Active  FROM english_emperor_user WHERE Email = ? AND Password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result=$stmt->get_result();

        if ($row =$result->fetch_assoc()) 
        {
            $res = array("status:"=>"S","message"=>"Login Successfully","Data"=>$row);
            echo json_encode($res);
        } 
        else 
        {
            $res = array("status:"=>"F","message"=>"Server error");
            echo "Invalid email or password";
        }
    }
    $stmt->close();
}
        catch(Exception $e)
        {
            echo "Internal server error" .$e->getMessage();
        }
        $conn->close();
    



// Close connection
?>