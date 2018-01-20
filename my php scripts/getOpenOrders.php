<?php
header('Content-Type: text/html; charset = utf-8');
$servername = "localhost";
$username = "LiranTal";
$password = "LiranTal";
$dbname = "tades_";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if($conn->connected_error)
{die("Connection failed:" .$conn->connected_error);}

$result = $conn->query("SELECT * FROM orders WHERE orderStatus = \"open\"");
$data =  array();

if($result->num_rows > 0) # check if there is any data
{
    while($row = $result->fetch_assoc())
    {        
        array_push($data,$row);
    }
}

echo json_encode(array('openOrders'=> $data));
$conn->close(); 
        
?>