<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
    <style>
    
    
        .container{
            margin-top:50px
        }
        .col-sm-5{
            margin-left:25em;
        }
        .panel-info{
            border:1px solid;
        }
        .panel-heading{
            background-color:blue;
            margin-bottom:20px;
            color:white;
            text-align:center;
        }
        #button{
            display:flex;
            flex-direction:row;
            justify-content:flex-end;
            margin-top:2em;
        }
        .btn{
            margin-right:30px
        }
        .info{
            background-color:silver;
            padding:20px;
            margin-bottom:20px;
            margin-top:-1.3rem;
            display:flex;
            justify-content:space-around;
        }
        .label{
            display:flex;
            justify-content:flex-end;
        }
        h1{ text-transform:uppercase}
        a{color:white;}
        a:hover{
            color:white;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div class="container">
     
      </div>
        <div class="col-sm-5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h1>Gestion de payement</h1>
                </div>
                <div class="panel-body">
                    <div class="info">
                        <div>
                            <p>Nom:<?= $nom ;?></p>
                            <p>contact: <?= $contact ;?></p>
                            <p>CIN: <?= $cin ;?></p>
                        </div>     
                         <div><p>Reste de votre Salaire:</p>
                            <h2><?= $salaire ;?>Ar</h2>
                         </div>
                    </div>
                   
                    <div class="">
                        <form action="#"class="form-horizontal" id="form">
                            <!-- <div class="form-group row">
                                <label for="" class="col-sm-4">Code employee</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="">
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label">Montant</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="montant">
                                </div>
                            </div>
                            <div class="form-group " id="button">
                                <button class="btn btn-danger"><a href="/employee/list">Annuler</a></button>
                                <button class="btn btn-primary" onclick="save()">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('/assets/js/jquery.min.js');?>"></script>
    <script src="<?= base_url('/assets/js/bootstrap.min.js');?>"></script>
    <script>
        function save(){

         $.ajax({
            url:'<?= site_url('payement/rettrait/');?>'+<?= $id ;?>,            
            type:'POST',
            data: new FormData($("#form")[0]),
            dataType: 'JSON',
            contentType:false,
            processData:false,
            
            success: function(data){
                if(data.status){
                    alert("success");
                }else{
                    alert("invalid, data not inserted !");
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert("votre solde est insuffisant, verifiez le solde ci-dessous");
            }
        });
     }
     function test(){
         alert(<?= $id ;?>)
     }
    </script>
</body>
</html>