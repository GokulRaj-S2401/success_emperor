<?php
$server="localhost";
$username="root";
$password="Iyappanmagesh2004@";
$database="success_emperor";
$conn=new mysqli($server,$username,$password,$database);
if(!$conn)
{
    echo "Connection failed";
}
?>