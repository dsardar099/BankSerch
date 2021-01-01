<?php
$bank = $_POST["bank"];
$state = $_POST["state"];
$district = $_POST["district"];
$city = $_POST["city"];

include('db.php');

$sql ="SELECT DISTINCT BRANCH FROM BANKS WHERE BANK='$bank' AND STATE='$state' AND DISTRICT='$district' AND CITY='$city' ORDER BY BRANCH";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = '';
if(mysqli_num_rows($result) >0 ){
while($row = mysqli_fetch_assoc($result))
{
    $output.='<option value="'.$row["BRANCH"].'">'.$row["BRANCH"].'</option>';
}
echo $output;
}
?>