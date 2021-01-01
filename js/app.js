if(document.querySelector("#btnloc")!=null)
{
    var btnloc=document.querySelector("#btnloc");
    btnloc.addEventListener('click',(e)=>{
    window.location.href="searchbylocation.php";
});
}

if(document.querySelector("#btnifsc")!=null)
{
    var btnifsc=document.querySelector("#btnifsc");
    btnifsc.addEventListener('click',(e)=>{
    window.location.href="searchbyifsc.php";
});
}

if(document.querySelector("#btnmicr")!=null)
{
    var btnmicr=document.querySelector("#btnmicr");
    btnmicr.addEventListener('click',(e)=>{
    window.location.href="searchbymicr.php";
});
}
/*
if(document.querySelector("#searchf")!=null)
{
    var searchf=document.querySelector("#searchf");
    var bank=document.getElementsByName("bank");
    searchf.addEventListener('submit',(e)=>{
            if(!searchf.checkValidity()){
              e.preventDefault();
              e.stopPropagation();
            }

            searchf.classList.add('was-validated');
        
        }, false);
}
*/
