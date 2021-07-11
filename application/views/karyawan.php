                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Karyawan<a class="btn btn-primary btn-sm d-none float-end d-sm-inline-block" role="button" href="<?= site_url('karyawan/create')?>"><i class="fas fa-users fa-sm text-white-50"></i>Tambah Karyawan</a></h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Informasi Karyawan</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="<?= site_url('karyawan/index')?>" method="post">
                                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                            <label class="form-label" style="float: left;width: 300px;">
                                                <input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search" name="keyword">
                                            </label>
                                            <input class="btn btn-primary" type="submit" name="submit" value="Cari" style="float: left; margin-left: 20px; width:120px">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?= $this->session->flashdata('info') ?>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Domisili</th>
                                            <th>Umur</th>
                                            <th style="width: 122.6px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $row){?>
                                        <tr>
                                            <!-- <-?php print_r($row);?> -->
                                            <td><?= $row['Nama'];?></td>
                                            <td><?= $row['Posisi'];?></td>
                                            <td><?= $row['Domisili'];?></td>
                                            <td><?= $row['Umur'];?></td>
                                            <td style="width: 173.4px;"><a href="<?= site_url() ?>karyawan/delete/<?= $row['id_karyawan']?>" class="btn btn-danger" type="button">Hapus</a>
                                            <a href="<?= site_url()?>karyawan/edit/<?= $row['id_karyawan']?>" class="btn btn-primary" type="button" style="margin: 7px;">Ubah</a></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Nama</strong></td>
                                            <td><strong>Posisi</strong></td>
                                            <td><strong>Domisili</strong></td>
                                            <td><strong>Umur</strong></td>
                                            <td><strong><br>Mulai Bekerja<br><br></strong></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php 
                                    echo $pagination; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>