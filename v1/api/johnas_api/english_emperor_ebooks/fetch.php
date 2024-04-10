<?php
    include ('../../../../DB/connection.php');
        try{
            $id = $_POST['id'];
            $stmt = $conn->prepare("SELECT book_name, created_on, created_by, price, offer, category FROM english_emperor_ebooks WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

                if($row = $result->fetch_assoc()){
                    $res = array("Book_name:" . $row['book_name']. " Created_on:" . $row['created_on'] . " Created_by:".  $row['created_by'] . " Price:".  $row['price'] . " Offer:". $row['offer'] . " Category:". $row['category']);
                    echo json_encode($res);
                }
                else{
                    $res =  array("status"=>"S", "message"=>"Internal server error.");
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