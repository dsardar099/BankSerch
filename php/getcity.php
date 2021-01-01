<?php
$bank = $_POST["bank"];
$state = $_POST["state"];
$district = $_POST["district"];

include('db.php');

$sql ="SELECT DISTINCT CITY FROM BANKS WHERE BANK='$bank' AND STATE='$state' AND DISTRICT='$district' ORDER BY CITY";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = '';
if(mysqli_num_rows($result) >0 ){
while($row = mysqli_fetch_assoc($result))
{
    $output.='<option value="'.$row["CITY"].'">'.$row["CITY"].'</option>';
}
echo $output;
}
?>