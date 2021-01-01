<?php include('header.php'); ?>
    <title>Search By IFSC</title>
  </head>
  <body>
<?php $page="search"; ?>
    <?php include('navbar.php'); ?>

<!-- loader start -->

<div id="wait" style="display:none;width:70px;height:70px;border:0px solid black;position:absolute;top:40%;left:50%;padding:0px;"><img src='pic/wait.gif' width="70" height="70" /><br></div>

<!-- loader end -->


<!-- search start -->
<div  class="container">
    <div  class="row">
    
        <div  class="col-12 text-center">
        <div class="p-1 my-2 rounded bg-warning text-dark h3">
        Search Bank By IFSC Code
        </div>
        </div>
        
        <div  class="col-12">
        
        <form  class="bg-light py-2 px-2 rounded needs-validation" id="searchf" novalidate>
        
  <div class="mb-3">
    <label for="ifsccode" class="form-label">IFSC CODE</label>
    <input type="text" class="form-control" id="ifsccode" aria-describedby="ifschelp" required>
    <div id="ifschelp" class="form-text"><span class="text-danger">*</span>Enter Bank IFSC Code</div>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Oops something went wrong!
    </div>
  </div>
  
  
  <div  class="mb-3 text-center">
  <button type="submit" id="searchbtn" class="btn btn-primary">Search</button>
  </div>
  
  
  
</form>
        
        </div>
        
        <div id="result" class="my-2">
            
        </div>
        
        <div  class="row justify-content-center text-center my-2">
            <div  class="col-12 col-sm-6 my-1">
                <button type="button" class="btn btn-info" id="btnloc">Search Bank By Location</button>
            </div>
            <div  class="col-12 col-sm-6 my-1">
                <button type="button" class="btn btn-success" id="btnmicr">Search Bank By MICR Code</button>
            </div>
        </div>
        
    </div>
</div>
<!-- search end -->


<?php include('footer.php'); ?>
<script type="text/javascript" src="js/app.js"></script>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // Load records
    
    $(document).ajaxStart(function(){
  $("#wait").css("display", "block");
    });

    $(document).ajaxComplete(function(){
  $("#wait").css("display", "none");
     });
    
    
    
    $("#searchbtn").on("click",function(e){
       e.preventDefault();
       var searchf=document.querySelector("#searchf");
    //var bank=document.getElementsByName("bank");
    if(!searchf.checkValidity()){
        e.preventDefault();
        e.stopPropagation();
    }

    searchf.classList.add('was-validated');
        
        
       var ifsc = $('#ifsccode').val();
       //searchf.reset();
       $.ajax({
         url: "php/searchifsc.php",
         type: "POST",
         data : {ifsc:ifsc },
         success: function(data) {
           $("#result").html(data);
         }
       });
     });
  });
</script>
  </body>
</html>