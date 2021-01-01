<?php

include('db.php');

$sql ="SELECT DISTINCT BANK FROM BANKS ORDER BY BANK";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = '';
if(mysqli_num_rows($result) >0 ){
while($row = mysqli_fetch_assoc($result))
{
    $output.='<option value="'.$row["BANK"].'">';
}
echo $output;
}
?>