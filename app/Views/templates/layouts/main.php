<!DOCTYPE html>
<html>
<title>Gestion Salaire</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css');?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/w3.css');?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('/DataTables/datatables.min.css');?>">

     <script src="<?= base_url('/assets/js/jquery.min.js');?>"></script>
    <script src="<?= base_url('/assets/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('/DataTables/datatables.min.js');?>"></script>
<style>
body,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
h1{color: #e60000;text-align:center;text-transform:uppercase;
  font-family: { inherit }
}
.fa{color:#e60000}
#footer{
  bottom:0px;
  position:fixed;
  width:100%;

}
#myTable_filter input{background-color:white;border-radius:5px;}
#myTable_wrapper{ background:#eff5f5;padding:10px;  }
#portfolio{ background:#ffff66;}
a:hover{text-decoration:none;}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
      <img src="<?=  base_url('/assets/images/Logo.png') ?>" style="width:40%;margin-left:25%;padding:5px" class="w3-round w3-card-2"><br><br>
    <p class="w3-text-grey">Gestion de Salaire</p>
  </div>
  <div class="w3-bar-block">
    <a href="/" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-home fa-fw w3-margin-right">Accueil</i></a> 
    <a href="/employee/list" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw w3-margin-right"></i>employee</a>
    <a href="/service" class="w3-bar-item w3-button w3-padding"><i class="fa fa-briefcase fa-fw w3-margin-right"></i>Service</a>
    <a href="/salaire"  class="w3-bar-item w3-button w3-padding"><i class="fa fa-usd  fa-fw w3-margin-right"></i>Salaire</a>
    <a href="/affectation"  class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>Affectation Personnel</a>
    <a href="/payement"  class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw w3-margin-right"></i>Historique de payement</a>
  </div>
  
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="../w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Gestion de Salaire</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <button class="w3-button w3-white"> <a href="/"><i class="fa fa-home w3-margin-right"></i>Accueil</a></button>
      <button class="w3-button w3-white"><a href="/employee/list"><i class="fa fa-users fa-pulse w3-margin-right"></i>Employee</a></button>
      <button class="w3-button w3-white"><a href="/service"><i class="fa fa-briefcase fa-pulse w3-margin-right"></i>Service</a></button>
      <button class="w3-button w3-white"><a href="affectation"><i class="fa fa-user fa-pulse w3-margin-right"></i>Affectation personnel</a></button>
      <button class="w3-button w3-white "><a href="/salaire"><i class="fa fa-usd fa-pulse w3-margin-right"></i>Salaire</a></button>
    </div>
    </div>
  </header>
  
  <!-- Contact Section -->
  <div class="w3-container w3-padding-large w3-grey" style=" margin-bottom:60px;">
       <?= $this->renderSection("content")?>   
  </div>
  
  <div class="w3-dark-grey w3-center w3-padding-24" id="footer">Gestion de salaire du personnel du CUF</a></div>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>

</html>