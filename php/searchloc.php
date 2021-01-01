<?php

$bank = $_POST["bank"];
$state = $_POST["state"];
$district = $_POST["district"];
$city = $_POST["city"];
$branch = $_POST["branch"];
include('db.php');


$sql ="SELECT * FROM BANKS WHERE BANK='$bank'";
if($state!="")
{
    $sql.=" AND STATE='$state'";
}
if($district!="")
{
    $sql.=" AND DISTRICT='$district'";
}
if($city!="")
{
    $sql.=" AND CITY='$city'";
}
if($branch!="")
{
    $sql.=" AND BRANCH='$branch'";
}
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = '';
if(mysqli_num_rows($result) ==1 ){
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
    if(mysqli_num_rows($result) > 0 ){
        $output='
<div class="alert alert-success my-1" role="alert">
  Bank Details Found!
</div>
';
while($row = mysqli_fetch_assoc($result))
{
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
<div class="row my-2">
    <div class="col-12">
    <button class="btn btn-warning btn-block" type="button" data-toggle="collapse" data-target="#'.$row["IFSC"].'" aria-expanded="false" aria-controls="'.$row["IFSC"].'">IFSC : '.$row["IFSC"].'&emsp;&emsp;'.'<span class="text-right"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
  <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
</svg></span></button>
    </div>
</div>

<div class="collapse multi-collapse" id="'.$row["IFSC"].'">
      <div class="card card-body">
';

$output.='<!-- result start -->
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
                CITY 
                </div>
                <div  class="col-4 bg-success text-light rounded">
                '.$row["CITY"].'                
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
$output.='</div>
</div>';
}
echo $output;
}
else
{
    echo '<div class="alert alert-danger text-center" role="alert">
  Bank Details Not Found!
</div>';
}
}




?>