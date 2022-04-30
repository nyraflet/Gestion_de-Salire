

<?= $this->extend("templates/layouts/main")?>
<?= $this->section('content') ?>
<style>
 h2{margin-left:10em}
</style>
<div style="display:flex;">
    <a href="javascript:void(0)" class="btn btn-success mt-3 mb-3" onclick="showModal()">+Ajouter</a>
    <h2>listes des salaires par personnel</h2>
</div>

    <table class="table table-striped table-hover" id="myTable">
        <thead>
             <tr>
                 <th>#</th>
                 <th>nom</th>
                 <th>prennom</th>
                 <th>CIN </th>  
                 <th>salaire</th>
                 <th>Prime </th>  
                 <th>salaire du :</th>   
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
                <form id="form" action="#" >
                   <!-- <input type="text" hidden="hidden" name="id">  -->
                    <div class="modal-body">                      
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Password:</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="salaire_du" name="salaire_du">
                                <span class="help-block text-danger"></span>
                            </div> 
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
        $(document).ready(function()
        {
            $("#myTable").DataTable(
                {
                "pageLenght":10,
                "ajax":{
                    "url": '<?= site_url('salaire/list'); ?>',
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
         $(".modal-title").text("Nouveau employee");
     }
     function reload_table() {
         table.ajax.reload(null,false);
     }
     function save(){
        
         $.ajax({
            url:'<?= site_url('salaire/calculer'); ?>',
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
                    alert("veuillez ressayer !")
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert("misy erreur zany");
            }
        });
     }
    </script>
<?= $this->endSection() ?> 