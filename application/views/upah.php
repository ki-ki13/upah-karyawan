<div class="container-fluid">
                    <h3 class="text-dark mb-4">Upah Minggu Ini&nbsp;</h3>
                    <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Informasi Upah</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form action="<?= site_url('upah/index')?>" method="post">
                                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                            <label class="form-label" style="float: left;width: 300px;">
                                                <input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search by name" name="keyword">
                                            </label>
                                            <input class="btn btn-primary" type="submit" name="submit" value="Cari" style="float: left; margin-left: 20px; width:120px">
                                        </div>
                                </form>
                            </div>
                            <?= $this->session->flashdata('info') ?>
                            <div class="row">
                                <div class="col">
                                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                        <table class="table my-0" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Upah / potong</th>
                                                    <th style="width: 158px;">Jumlah potongan</th>
                                                    <th style="width: 122.6px;">Total upah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $row){?>
                                                <tr>
                                                    <td><?= $row['Nama']?></td>
                                                    <td><?= $row['upah']?></td>
                                                    <td><?= $row['potongan']?></td>
                                                    <td><?= $row['total']?></td>
                                                </tr>
                                                <?php }?>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td style="height: 88.8px;"><strong>Nama</strong></td>
                                                    <td><strong>Upah / potong</strong></td>
                                                    <td><strong>Jumlah potongan<br></strong></td>
                                                    <td><strong>Total upah<br></strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <?php 
                                    echo $pagination; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>