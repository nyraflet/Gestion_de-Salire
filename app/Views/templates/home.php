<?= $this->extend("templates/layouts/main")?>

<?= $this->section("content")?>
<style>
   #home .fa{
      font-size:70px;color:black;
      display:flex;
      justify-content:center;
    }
    #home .w3-container{
      background-color:#e0e0d1;
      padding:10px;
    }
    #home .w3-third{
      margin-left:10px;
    }
    #lft{
      margin-top:10em;
    }
    p b{
      display:flex;
      justify-content:center;
    }

</style>
    <div class="container" id="home">
    <div class="w3-row-padding">
    <a href="/employee/list">
    <div class="w3-third w3-container w3-margin-bottom w3-card-2" style="margin-left:-20px" id="lft"> 
      <div class="w3-hover-opacity"> <span class="fa fa-users"></span></div>
      <div class="w3-container w3-white">
        <p><b>Employe</b></p>
        <p> Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    </a>
    
    <a href="">
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="<?=  base_url('/assets/images/hotelV.jpg') ?>" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>C.U.F</b></p>
          <p> Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        </div>
      </div>
    </a>
    
    <a href="/service">
      <div class="w3-third w3-container w3-margin-bottom w3-card-2" id="lft"> 
        <div class="w3-hover-opacity"> <span class="fa fa-briefcase"></span></div>
        <div class="w3-container w3-white">
          <p><b>Service</b></p>
          <p> Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        </div>
      </div>
    </a>
    
  </div>
  <!-- seconde -->
  <div class="w3-row-padding">
  <a href="">
    <div class="w3-third w3-container w3-margin-bottom w3-card-2" style="margin-left:-20px" id=""> 
        <div class="w3-hover-opacity"> <span class="fa fa-user"></span></div>
        <div class="w3-container w3-white">
          <p><b>affectation de personnel</b></p>
          <p> Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        </div>
    </div>
  </a>
    
    <a href="/salaire">
      <div class="w3-third w3-container w3-margin-bottom">
      <div class="w3-hover-opacity"> <span class="fa fa-usd"></span></div>
        <div class="w3-container w3-white">
          <p><b>Gestion de Salaire</b></p>
          <p> Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        </div>
      </div>
    </a>
    
    <a href="/payement">
      <div class="w3-third w3-container w3-margin-bottom w3-card-2" id=""> 
        <div class="w3-hover-opacity"> <span class="fa fa-book"></span></div>
        <div class="w3-container w3-white">
          <p><b>historique de payement</b></p>
          <p> Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        </div>
      </div>
    </a>
    
  </div>
    </div>
<?= $this->endSection() ?>