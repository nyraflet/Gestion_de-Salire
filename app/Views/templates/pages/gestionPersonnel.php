<?= $this->extend("templates/layouts/main")?>
<?= $this->section('content') ?>
    <div class="container">
         <form action="#" id="form" enctype="multipart/form-data">
            <input type="text" hidden="hidden" name="id"> 
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">code Employee :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="id_employee" name="id_employee">
                        <span class="help-block text-danger"></span>
                    </div>   
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">code Service :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="id_service" name="id_service"> 
                        <span class="help-block text-danger"></span>
                    </div> 
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">debut service :</label>
                    <div class="col-sm-9">
                        <input type="Number" class="form-control" id="debut_service" name="debut_service">
                        <span class="help-block text-danger"></span>
                    </div>   
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">fin Service:</label>
                    <div class="col-sm-9">
                        <input type="Date" class="form-control" id="fin_service" name="fin_service">
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
<?= $this->endSection() ?>