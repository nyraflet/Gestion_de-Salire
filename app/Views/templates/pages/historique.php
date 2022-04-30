<?= $this->extend("templates/layouts/main")?>

<?= $this->section("content")?>
<h2 style="text-align:center"> Liste des payements</h2>
    <div id="myTable_wrapper">
        <table class="table table-striped table-hover" id="myTable">
            <thead>
                <tr>
                    <th>nom</th>
                    <th>CIN </th>  
                    <th>montant</th>
                    <th>date retrait :</th>   
                </tr>
            </thead>
                
                <tbody> 
                    <?php  foreach($lP as $lis) {?> 
                        <tr>
                            <td><?= $lis['nom'];?></td>
                            <td><?= $lis['CIN'];?></td>
                            <td><?= $lis['montant'];?></td>
                            <td><?= $lis['date_retrait'];?></td>
                        </tr>   
                    <?php } ?>          
                </tbody>
            
        </table>
        
    </div>
<?= $this->endSection() ?>