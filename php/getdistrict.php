<?php
$bank = $_POST["bank"];
$state = $_POST["state"];

include('db.php');

$sql ="SELECT DISTINCT DISTRICT FROM BANKS WHERE BANK='$bank' AND STATE='$state' ORDER BY DISTRICT";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = '';
if(mysqli_num_rows($result) >0 ){
while($row = mysqli_fetch_assoc($result))
{
    $output.='<option value="'.$row["DISTRICT"].'">'.$row["DISTRICT"].'</option>';
}
echo $output;
}
?>