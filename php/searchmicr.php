<?php

$search_value = $_POST["micr"];

include('db.php');

$sql ="SELECT * FROM BANKS WHERE MICR='$search_value'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = '';
if(mysqli_num_rows($result) == 1 ){
    $row = mysqli_fetch_assoc($result);
    if($row["IMPS"]==true)
    {
        $row["IMPS"]="AVAILABLE";
    }
    else
    {
        $row["IMPS"]="NOT AVAILABLE";
    }
    if($row["RTGS"]==true)
    {
        $row["RTGS"]="AVAILABLE";
    }
    else
    {
        $row["RTGS"]="NOT AVAILABLE";
    }
    if($row["NEFT"]==true)
    {
        $row["NEFT"]="AVAILABLE";
    }
    else
    {
        $row["NEFT"]="NOT AVAILABLE";
    }
    if($row["UPI"]==true)
    {
        $row["UPI"]="AVAILABLE";
    }
    else
    {
        $row["UPI"]="NOT AVAILABLE";
    }
    if($row["MICR"]=="")
    {
        $row["MICR"]="NA";
    }
    else
    {
        
    }
$output.='
<div class="alert alert-success my-1" role="alert">
  Bank Details Found!
</div>
<!-- result start -->
<!--
            <div  class="row mt-1">
                <div  class="col-12 bg-warning text-dark rounded h2 text-center display-6">
                Your Search Result
                </div>
            </div>
-->
            <div  class="row mt-2">
                <div  class="col-4 bg-primary text-light rounded font-weight-bold">
                Bank Name 
                </div>
                <div  class="col-8 bg-success text-light rounded">
                '.$row["BANK"].'
                </div>
            </div>
            
            <div  class="row mt-1">
                <div  class="col-2 bg-primary text-light rounded font-weight-bold">
                IFSC 
                </div>
                <div  class="col-4 bg-success text-light rounded">
                '.$row["IFSC"].'                
                </div>
                <div  class="col-2 bg-primary text-light rounded font-weight-bold">
                MICR
                </div>
                <div  class="col-4 bg-success text-light rounded">
                '.$row["MICR"].'             
                </div>
            </div>
            <div  class="row mt-1">
                <div  class="col-2 bg-primary text-light rounded font-weight-bold">
                Branch 
                </div>
                <div  class="col-4 bg-success text-light rounded">
                '.$row["BRANCH"].'               
                </div>
                <div  class="col-2 bg-primary text-light rounded font-weight-bold">
                Center
                </div>
                <div  class="col-4 bg-success text-light rounded">
                '.$row["CENTRE"].'            
                </div>
            </div>
            
            <div  class="row mt-1">
                <div  class="col-2 bg-primary text-light rounded font-weight-bold">
                State 
                </div>
                <div  class="col-4 bg-success text-light rounded">
                '.$row["STATE"].'               
                </div>
                <div  class="col-2 bg-primary text-light rounded font-weight-bold">
                District
                </div>
                <div  class="col-4 bg-success text-light rounded">
               '.$row["DISTRICT"].'            
                </div>
            </div>
            
            <div  class="row mt-1">
                <div  class="col-4 bg-primary text-light rounded font-weight-bold">
                Address 
                </div>
                <div  class="col-8 bg-success text-light rounded">
                '.$row["ADDRESS"].'
                </div>
            </div>
            
            <div  class="row mt-1">
                <div  class="col-4 bg-primary text-light rounded font-weight-bold">
                Contact 
                </div>
                <div  class="col-8 bg-success text-light rounded">
              '.$row["CONTACT"].'
                </div>
            </div>
            
            
            <div  class="row mt-1">
                <div  class="col-2 bg-primary text-light rounded font-weight-bold">
                IMPS 
                </div>
                <div  class="col-4 bg-success text-light rounded">
                '.$row["IMPS"]
                .'              
                </div>
                <div  class="col-2 bg-primary text-light rounded font-weight-bold">
                RTGS
                </div>
                <div  class="col-4 bg-success text-light rounded">
                '.$row["RTGS"].'            
                </div>
            </div>
            
            <div  class="row mt-1">
                <div  class="col-2 bg-primary text-light rounded font-weight-bold">
                NEFT 
                </div>
                <div  class="col-4 bg-success text-light rounded">
                '.$row["NEFT"].'               
                </div>
                <div  class="col-2 bg-primary text-light rounded font-weight-bold">
                UPI
                </div>
                <div  class="col-4 bg-success text-light rounded">
                '.$row["UPI"].'            
                </div>
            </div>
            
<!-- result end -->';
echo $output;
}
else
{
    echo '<div class="alert alert-danger text-center" role="alert">
  Bank Details Not Found!
</div>';
}
?>