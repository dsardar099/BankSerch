<?php include('header.php'); ?>
    <title>Search By Location</title>
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
        Search Bank By Location
        </div>
        </div>
        
        <div  class="col-12">
        
        <form  class="bg-light py-2 px-2 rounded needs-validation" id="searchf" novalidate>
        
  <div class="mb-3">
      <input class="form-control" list="bankname" id="bank" placeholder="Type to search bank...">
    <datalist id="bankname">
<!-- <option value="" selected disabled hidden><span class="font-weight-bold" >Select Bank</span></option>
-->
</datalist>
    <div id="micrhelp" class="form-text text-right"><span class="text-danger">*</span> Please select one bank.</div>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      You should select one bank!
    </div>
  </div>
  
  <div class="mb-3">
    <select class="form-select mb-3" name="state" id="state"> 
<option selected disabled hidden value="NULL"><span class="font-weight-bold" value="">Select State</span></option>

</select>
<div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  <div class="mb-3">
    <select class="form-select mb-3" name="district" id="district"> 
<option selected disabled hidden value=""><span class="font-weight-bold" >Select District</span></option>
</select>
<div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  <div class="mb-3">
    <select class="form-select mb-3" name="city" id="city"> 
<option selected disabled hidden value=""><span class="font-weight-bold" >Select City</span></option>
</select>
<div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  <div class="mb-3">
    <select class="form-select mb-3" name="branch" id="branch"> 
<option selected disabled hidden value=""><span class="font-weight-bold" >Select Branch</span></option>
</select>
<div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  
  
  <div  class="mb-3 text-center">
  <button type="submit" id="searchbtn" class="btn btn-primary">Search</button>
  </div>
  
  
  
</form>
        
        </div>
        
        <div class="my-2" id="result">
        
        </div>
        
        <div  class="row justify-content-center text-center my-2">
            <div  class="col-12 col-sm-6 my-1">
                <button type="button" class="btn btn-info" id="btnifsc">Search Bank By IFSC Code</button>
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
    
    $('form input').on('keypress', function(e) {
    return e.which !== 13;
        
    });

    
    $(document).ajaxStart(function(){
        
  $("#wait").css("display", "block");
    });

    $(document).ajaxComplete(function(){
  $("#wait").css("display", "none");
     });
    
    function loadBank(){
   //$('#bank').attr('disabled', 'disabled');
      $.ajax({
        url : "php/getbank.php",
        type : "POST",
        success : function(data){
          $("#bankname").append(data);
          //$('#bank').removeAttr("disabled");
        }
      });
    }
    loadBank();
    
    
    $("#bank").on("change",function(e){
        
        
        $("#state").empty();
           $("#state").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select State</span></option>");
        
        $("#district").empty();
           $("#district").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select District</span></option>");
        
        $("#city").empty();
           $("#city").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select City</span></option>");
        
        $("#branch").empty();
           $("#branch").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select Branch</span></option>");
        
        
        var bank = $('#bank').val();
       //searchf.reset();
       $.ajax({
         url: "php/getstate.php",
         type: "POST",
         data : {bank:bank },
         success: function(data) {
           $("#state").empty();
           $("#state").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select State</span></option>");
           $("#state").append(data);
         }
       });
        
        
    })
    
    $("#state").on("change",function(e){
        
        
        $("#district").empty();
           $("#district").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select District</span></option>");
        
        $("#city").empty();
           $("#city").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select City</span></option>");
        
        $("#branch").empty();
           $("#branch").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select Branch</span></option>");
        
        
        var bank = $('#bank').val();
        var state = $('#state').val();
       //searchf.reset();
       $.ajax({
         url: "php/getdistrict.php",
         type: "POST",
         data : {bank:bank,state:state },
         success: function(data) {
           $("#district").empty();
           $("#district").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select District</span></option>");
           $("#district").append(data);
         }
       });
        
        
    })
    
    
    $("#district").on("change",function(e){
        
        //$("$city").reset();
        $("#city").empty();
        $("#city").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select City</span></option>");
        
        $("#branch").empty();
           $("#branch").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select Branch</span></option>");
        
        
        
        var bank = $('#bank').val();
        var state = $('#state').val();
        var district = $('#district').val();
       //searchf.reset();
       $.ajax({
         url: "php/getcity.php",
         type: "POST",
         data : {bank:bank,state:state,district:district },
         success: function(data) {
           $("#city").empty();
           $("#city").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select City</span></option>");
           $("#city").append(data);
         }
       });
        
        
    })
    
    
    $("#city").on("change",function(e){
        
        $("#branch").empty();
           $("#branch").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select Branch</span></option>");
        
        var bank = $('#bank').val();
        var state = $('#state').val();
        var district = $('#district').val();
        var city = $('#city').val();
       //searchf.reset();
       $.ajax({
         url: "php/getbranch.php",
         type: "POST",
         data : {bank:bank,state:state,district:district,city:city },
         success: function(data) {
           $("#branch").empty();
           $("#branch").append("<option selected disabled hidden value='NULL'><span class='font-weight-bold' value=''>Select Branch</span></option>");
           $("#branch").append(data);
         }
       });
        
        
    })
    
    
    
    $("#searchbtn").on("click",function(e){
       e.preventDefault();
       var searchf=document.querySelector("#searchf");
    if(!searchf.checkValidity()){
        e.preventDefault();
        e.stopPropagation();
    }

    searchf.classList.add('was-validated');
        
    var bank=$('#bank').val();
    var state=$('#state').val();
    var district=$('#district').val();
    var city=$('#city').val();
    var branch=$('#branch').val();
       //var ifsc = $('#ifsccode').val();
       //searchf.reset();
       $.ajax({
         url: "php/searchloc.php",
         type: "POST",
         data : {bank:bank,state:state,district:district,city:city,branch:branch },
         success: function(data) {
           $("#result").html(data);
         }
       });
     });
  });
</script>
  </body>
</html>