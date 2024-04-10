<?php
    include ('../../../../DB/connection.php');
        try{
            $issuerid = $_POST['issuerid'];
            $stmt = $conn->prepare("SELECT * FROM english_emperor_ebook_purchase WHERE issuerid = ?");
            $stmt->bind_param("i", $issuerid);
            $stmt->execute();
            $result = $stmt->get_result();
                if($row = $result->fetch_assoc()){
                    $res = array($row);
                    echo json_encode($res);
                }
                else{
                    $res =  array("status"=>"F", "message"=>"Internal server error.");
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