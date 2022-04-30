<style>

</style>
<?= $this->extend("templates/layouts/main")?>
<?= $this->section('content') ?>
<style>
h2{margin-left:10em}
.fa-edit{color:#002080}
</style>
<div style="display:flex;">
    <a href="javascript:void(0)" class="btn btn-success mt-3 mb-3" onclick="showModal()">+Ajouter</a>
    <h2>listes des Services</h2>
</div>
    <table class="table table-striped table-hover" id="myTable">
        <thead>
             <tr>
                 <th>#</th>
                 <th>code Service</th>
                 <th>nom Service</th> 
                 <th>lib Service</th> 
                 <th>salaire de base</th> 
                 <th>edamnite</th>                  
                 <th>Action</th>  
             </tr>
        </thead>
              
            <tbody>               
            </tbody>
        
    </table>

    <!-- modal -->
    <div class="modal fade" id="modal-form"  tabindex="-1" role="dialog" aria-labelledby="boom" aria-hidden='true'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style=""></h5>
                    <button class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" id="form" enctype="multipart/form-data">
                    <input type="text" hidden="hidden" name="id"> 
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">code service :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="code_service" name="code_service">
                                <span class="help-block text-danger"></span>
                            </div>   
                        </div> 
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Nom service:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nom_service" name="nom_service">
                                <span class="help-block text-danger"></span>
                            </div>   
                        </div>                       
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">lib Service :</label>
                            <div class="col-sm-9">
                                <textarea name="lib_service" id="" rows="4" class="form-control"></textarea>
                                <span class="help-block text-danger"></span>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Salaire base:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="salaire_base" name="salaire_base">
                                <span class="help-block text-danger"></span>
                            </div>   
                        </div>  
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">endamnite:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="endamnite" name="endamnite">
                                <span class="help-block text-danger"></span>
                            </div>   
                        </div>  
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        <button class="btn btn-success"  onclick="save()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    function teste() {
        alert("this is");
    }
     $(document).ready(function()
     
     {
         var table;
         var url;
         var method;
         var id_service;
        $("#myTable").DataTable(
            {
            "pageLenght":10,
            "ajax":{
                "url": '<?= site_url('service/list')?>',
                "TYPE":"GET"
            },
            "serverSide":true,
            "deferRender":true
        }
        );
     });

     function showModal(){
         method ='save';
         $("#modal-form").modal("show");
         $(".modal-title").text("Nouveau Service");
     }
     function reload_table() {
         table.ajax.reload(null,false);
     }
     function save(){
         if(method=='save'){
             url ='<?= site_url('service/create'); ?>'
         }else{
             
             url='<?= site_url('service/edit/');?>'+id_service;
         }
         $.ajax({
            url:url,
            type:'POST',
            data: new FormData($("#form")[0]),
            dataType: 'JSON',
            contentType:false,
            processData:false,
            
            success: function(data){
                if(data.status){
                    alert("success");
                    $("#modal-form").modal('hidden');
                    
                }else{
                    alert("try again !");
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert("misy erreur zany");
            }
        });
     }
     
     function editData(id) {
        id_employee=id;
         method='update';
         $.ajax({
            url:'<?= site_url('service/edit/');?>'+id,
            type:'GET',
            dataType:'JSON',
            success: function(data){
                $('[name="id"]').val(data.id_service);
                $('[name="code_service"]').val(data.code_service);
                $('[name="nom_service"]').val(data.nom_service);
                $('[name="=lib_service"]').val(data.lib_service);
                $('[name="salaire_base"]').val(data.salaire_base);
                $('[name="endamnite"]').val(data.endamnite);

                $("#modal-form").modal("show");
                $(".modal-title").text("modification de service");
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert("misy erreur zany");
               
            }
            
        });
     }
     function deleteData(id) {
         if(confirm('vous voulez supprimer definiteivement ce donnees?')){
             $.ajax({
                url:'<?= site_url('/employee/delete/'); ?>'+id,
                type:'DELETE',
                dataType:'JSON',
                success: function(data){
                    if(data.status){
                        alert("donnees supprimer avec success");
                    }else{
                        alert("le donnees n'est supprimer, veuillez ressayer !");
                    }
                    reload_table();
                },
                error: function(jqXHR, textStatus, errorThrown){
                alert("misy erreur zany, tsy nifafa zay");
               
            }
             });    
         }
     }
    </script> 
<?= $this->endSection() ?> 
 

