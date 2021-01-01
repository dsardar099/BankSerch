<?php include('header.php'); ?>
    <title>Contact Us</title>
  </head>
  <body>
    <?php $page="contact"; ?>
    <?php include('navbar.php'); ?>
    
    <!-- loader start -->

<div id="wait" style="display:none;width:70px;height:70px;border:0px solid black;position:absolute;top:40%;left:50%;padding:0px;"><img src='pic/wait.gif' width="70" height="70" /><br></div>

<!-- loader end -->
    
    
<div class="container-fluid">
    
    <div class="row bg-primary text-light rounded my-2 py-4" style="background: linear-gradient(to left, #3494e6 0%, #ec6ead 100%)">
        <div class="col-12 text-center">
         <div class="display-3 font-weight-bold">Contact Us</div>
<div class="display-4">Leave Us A Note!</div>
<div class="pt-2">If your query is urgent, you can call or e-mail us :</div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12" id="stat">
            
        </div>
    </div>
</div>
<div class="container">
    <!-- contact content start -->

    <div class="row justify-content-center text-secondary my-2">
        <div class="col-8 col-md-6 py-2 mt-2 text-center bg-light rounded">
            <div class="align-middle pt-2">
                <img class="img-thumbnail w-50" src="pic/gmail.png">
            </div>
            <div class="align-middle text-danger h3 pt-2">
                Mail Us
            </div>
            <div class="align-middle text-primary font-weight-bold h4 py-2">
                care@yourbankifsc.com
            </div>
        </div>
        
        
        <div class="col-8 col-md-6 text-center py-2 px-1 mt-2 bg-light rounded">
            <div class="align-middle pt-2">
                <img class="img-thumbnail w-50" src="pic/telephone.png">
            </div>
            <div class="align-middle text-danger h3 pt-2">
                Call Us
            </div>
            <div class="align-middle text-primary font-weight-bold h4 py-2">
                +91 7384488082
            </div>
        </div>
        
        
    </div>
    <div class="row">
        <div class="col-12 text-justify font-weight-bold" style="font-family: 'Grandstander', cursive;">
            
        </div>
    </div>
    
    <!-- contact content end -->
</div>

<!-- form start -->

<div class="container-fluid">
    <div class="row">
        <div class="col-5 d-none d-md-block text-center align-middle">
             <img src="pic/contact.png" class="img-fluid align-middle py-auto"></img>
        </div>
        
        <div class="col-md-7 py-3"> 
        <div class="text-dark h4 font-weight-bold">Fill Up This Form Below : </div>
        <form class="g-3 needs-validation" id="cform" novalidate> 
        
        <div class="mb-3"> 
        <label for="name" class="form-label text-primary">Name<span class="text-danger">*</span></label> 
        <input type="text" class="form-control border border-dark" id="name" name="name" required> 
        <div class="valid-feedback"> Looks good! </div> 
        <div class="invalid-feedback"> Something Wrong! </div> 
        </div>
        
        <div class="mb-3"> 
        <label for="email" class="form-label text-primary">Email<span class="text-danger">*</span></label> 
        <input type="email" class="form-control border border-dark" id="email" name="email" required> 
        <div class="valid-feedback"> Looks good! </div> 
        <div class="invalid-feedback"> Something Wrong! </div> 
        </div>
        
        <div class="mb-3"> 
        <label for="mobile" class="form-label text-primary">Mobile No<span class="text-danger">*</span></label> 
        <input type="number" class="form-control border border-dark" id="mobile" name="mobile" required> 
        <div class="valid-feedback"> Looks good! </div> 
        <div class="invalid-feedback"> Something Wrong! </div> 
        </div>
        
        <div class="mb-3"> 
        <label for="subject" class="form-label text-primary">Subject<span class="text-danger">*</span></label> 
        <input type="text" class="form-control border border-dark" id="subject" name="subject" required> 
        <div class="valid-feedback"> Looks good! </div> 
        <div class="invalid-feedback"> Something Wrong! </div> 
        </div>
        
        <div class="mb-3"> 
        <label for="message" class="form-label text-primary">Message<span class="text-danger">*</span></label> 
        <textarea class="form-control border border-dark" rows= "5" id="message" name="message" required></textarea>
        <div class="valid-feedback"> Looks good! </div> 
        <div class="invalid-feedback"> Something Wrong! </div> 
        </div>
        
        
        <div class="mb-3 text-center"> 
        <button type="submit" id="send" class="btn btn-primary mb-3 text-center">SEND</button>
        </div>
        
        
        </form>
        </div>
    </div>
</div>
        
<!-- form end -->


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
    
    
    
    $("#send").on("click",function(e){
       e.preventDefault();
       var cform=document.querySelector("#cform");
    //var bank=document.getElementsByName("bank");
    if(!cform.checkValidity()){
        e.preventDefault();
        e.stopPropagation();
    }

    cform.classList.add('was-validated');
        
        
       var name = $('#name').val();
       var email = $('#email').val();
       var mobile = $('#mobile').val();
       var subject = $('#subject').val();
       var message = $('#message').val();
       cform.reset();
       if(name!="" && email!="" && mobile!="" && subject!="" && message!=""){
           $.ajax({
         url: "php/sendmail.php",
         type: "POST",
         data : {name:name,email:email,mobile:mobile,subject:subject,message:message },
         success: function(data) {
           $("#stat").html(data);
         }
       });
       }
       
       
     });
  });
</script>

  </body>
</html>