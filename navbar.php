    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="pic/logo.png" width="55" height="55" class="d-inline-block align-top" alt="" loading="lazy">
     <span  class="display-4">Yourbankifsc</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav h5 text-right my-2 ml-auto">
        <a class="nav-link <?php if($page=='home'){echo 'active'; }?>" aria-current="page" href="index.php">HOME</a>
        <a class="nav-link <?php if($page=='search'){echo 'active'; }?>" href="searchbylocation.php">SEARCH BANK</a>
        <a class="nav-link <?php if($page=='about'){echo 'active'; }?>" href="about.php">ABOUT US</a>
        <a class="nav-link  <?php if($page=='contact'){echo 'active'; }?>" href="contact.php">CONTACT US</a>
      </div>
    </div>
  </div>
</nav>
    <!-- navbar end -->
