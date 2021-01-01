<?php

$bank = $_POST["bank"];

include('db.php');

$sql ="SELECT DISTINCT STATE FROM BANKS WHERE BANK='$bank' ORDER BY STATE";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = '';
if(mysqli_num_rows($result) >0 ){
while($row = mysqli_fetch_assoc($result))
{
    $output.='<option value="'.$row["STATE"].'">'.$row["STATE"].'</option>';
}
echo $output;
}
?>