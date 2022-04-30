<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('/assets/css/font-awesome.min.css');?>">
  <title>Document</title>
  <style>
  h2{text-align:center}
  .container{
    margin:5em auto;
    width:30%;
    padding:15px;
    background:#527a7a;
    color:white;
    padding-top:6em;
    padding-bottom:4em;
    border-radius:10px
  }
    .form-group{
      display:flex;
      justify-content:space-around;
      margin-bottom:35px;
    }
    .save{
      background:#33cc33;
      width:58%;
      height:40px;
      border:2px solid #33cc33;
      border-radius:10px;
      margin-left:8.5em;
    }
    input{border-radius:10px;height:35px;border:1px;text-align:center}
    a{text-decoration:none;color:#000033;
    }
    a:hover{
      text-decoration:none;
    }
    .fa{font-size:80px ;
      
    }
    i{
      position:absolute;
      color:white;
      margin-left:2em;margin-top:-1.8em;
      background:#334d4d;
      border-radius:50%;
      padding:5px;
      padding-left:15px;
      padding-right:15px;
    }
  </style>
</head>
<body>
    
    <div class="container">
    <i class="fa fa-user"></i>
      <div class="header"><h2>Login</h2></div>
      <div class="body">
          <form action="#" class="form">
            <div class="form-group">
              <label for="username">username</label>
              <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="username">password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="save">Login</button>
            </div>
          </form>
      </div>
      <div class="footer" style="margin-left:8em">
          <a href="">mot de pass oublier ???</a>
      </div>
    </div>
</body>
</html>
