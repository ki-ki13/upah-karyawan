<div class="container-fluid">
                    <h3 class="text-dark mb-4">Update Upah</h3>
                    <div class="card shadow mb-5">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Klik untuk mengubah</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="<?= site_url('update_upah/index')?>" method="post">
                                            <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                                <label class="form-label" style="float: left;width: 300px;">
                                                    <input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search" name="keyword">
                                                </label>
                                                <input class="btn btn-primary" type="submit" name="submit" value="Cari" style="float: left; margin-left: 20px; width:120px">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <?= $this->session->flashdata('info') ?>
                                        <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                        <?php 
                                            if(validation_errors() != false)
                                            {
                                                ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                                <?php
                                            }
                                        ?>
                                        <form action="<?= site_url('update_upah/insertpot')?>" method ="post"> 
                                            <table class="table my-0" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Posisi</th>
                                                        <th>Jumlah potongan</th>
                                                        <th>Upah/potong</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data as $row) {?>
                                                    <input type="hidden" name="id_karyawan[]" id="id_karyawan" value="<?= $row['id_karyawan']; ?>"/>  
                                                    <tr>
                                                        <td><?= $row['Nama']?></td>
                                                        <td><?= $row['Posisi']?></td>
                                                        <td><input id="potongan<?= $row["id_karyawan"]?>" type="number" style="border-radius: 5px;border-width: 1px;border-color: rgba(133,135,150,0.3);" name="potongan[]" oninput="calculate<?= $row['id_karyawan']?>()"></td>
                                                        <td id="upah<?= $row['id_karyawan']?>" value="<?= $row['upah']?>"><?= $row['upah']?></td>
                                                        <input type="hidden" name="id_upah[]" id="id_upah" value="<?= $row['id_upah']; ?>"/>
                                                        <td>
                                                            <input id="result<?= $row['id_karyawan']?>" class="form-control" type="text" placeholder="total" name="total[]">
                                                        </td>
                                                    </tr>
                                                    <script>
                                                    function calculate<?= $row['id_karyawan']?>() {
                                                        var upah<?= $row['id_karyawan']?> = document.getElementById('upah<?= $row['id_karyawan']?>').innerHTML;	
                                                        var potongan<?= $row['id_karyawan']?> = document.getElementById('potongan<?= $row['id_karyawan']?>').value;
                                                        var result<?= $row['id_karyawan']?> = document.getElementById('result<?= $row['id_karyawan']?>');	
                                                        var myResult<?= $row['id_karyawan']?> = upah<?= $row['id_karyawan']?> * potongan<?= $row['id_karyawan']?>;
                                                        result<?= $row['id_karyawan']?>.value = myResult<?= $row['id_karyawan']?>;
                                                        // console.log(potongan);
                                                    }
                                                </script>
                                                    <?php }?> 
                                                </tbody>
                                                <tfoot>
                                                    <tr></tr>
                                                </tfoot>
                                            </table>
                                            </div><button type="submit" class="btn btn-primary float-end" type="button" style="width: 165.15px;margin: 0px 0 10px 0px;margin-right: 50px;">Simpan</button>
                                             </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <?php 
                                    echo $pagination;?>
                                    
                                </div>
                            </div>
                    </div>
                
            </div>

            
