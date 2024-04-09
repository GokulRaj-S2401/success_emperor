<?php

$servername = "localhost"; 
$username = "root"; 
$password = "ssbaide220"; 
$database ="english_emperor";

$conn = new mysqli($servername, $username, $password,$database);
if(!$conn)
{
    echo "error".$conn->error();
}


?>
