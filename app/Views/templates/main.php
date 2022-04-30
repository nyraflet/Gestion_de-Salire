<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css');?>">
    <link rel="stylesheet" href="<?= base_url('/DataTables/datatables.min.css');?>">
  
     <!-- this load the javascript -->

    <script src="<?= base_url('/assets/js/jquery.min.js');?>"></script>
    <script src="<?= base_url('/assets/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('/DataTables/datatables.min.js');?>"></script>
    <style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  border-right: 5px outset rgba(225,225,222,0.5);
  overflow-y:scroll;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  color: #818181;
  display: block;
  transition: 0.3s;
  background:rgba(225,225,222,0.1);
  margin-bottom:5px;
}

.sidebar a:hover {
  color: white;
  background-color:rgba(225,225,225,0.2);
}

#main .closebtn {
  top: 0;
  font-size: 30px;
  margin-left: 50px;
  text-decoration: none;
  color: white;

}

#main .openbtn {
  font-size: 30px;
  cursor: pointer;
  color: white;
  display:none;
  
}
#main {
  transition: margin-left .5s;
  margin-left: 250px
}
.navbar-expand-lg{
  height: 40px;
}
.containers{
  background-color: rgba(225,255,55,0.3);
  margin:10px;
  border:4px inset rgba(225,225,225,0.3);
  padding:20px;
}
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>
    
    <div id="mySidebar" class="sidebar">
        <a href="/employee/list">mployees</a>
        <a href="/service">Services</a>
        <a href="/salaire">Salaire</a>
        <a href="/payement">Payement</a>
        <a href="#">Contact</a>
        
    </div>

    <div id="main">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">☰</a>
        <a class="openbtn" onclick="openNav()">☰</a> 
        <div class="container">

          <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item  active">
                <a  class="nav-link" href="">Home</a>
              </li>
              <li class="nav-item  active">
                <a  class="nav-link" href="">Employee</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="containers">
          <?= $this->renderSection("content")?>         
      </div>
    </div>

    </script>

        <script>
        function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        
        document.getElementById("main").style.marginLeft = "250px";
        
        }

        function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        }

       
    </script>
   
</body>
   
</html>