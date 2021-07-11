<div class="container-fluid">
                    <div class="card shadow mb-5" style="width: 60%;margin: 0 auto;">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold" style="font-size: 34px;text-align: center;">Karyawan</p>
                        </div>
                        <div class="card-body">
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
                            <div class="row">
                                <div class="col">
                                    <form  method="post" action="<?= site_url('karyawan/update'); ?>">
                                    <input type="hidden" name="id_karyawan" id="id_karyawan" value="<?= $karyawan->id_karyawan; ?>"/>
                                        <label class="form-label">Nama</label>
                                        <input class="form-control" type="text" placeholder="Nama" name="nama" value="<?= $karyawan->Nama; ?>">
                                        <label class="form-label">Posisi</label>
                                        <select class="form-select" name="posisi">
                                            <option selected value='null'><?= $karyawan->Posisi?></option>
                                            <?php foreach ($posisi as $row) {?>
                                                 <option value="<?= $row->id_upah?>"><?= $row->Posisi?></option>";
                                            <?php }?>
                                        </select>
                                        <label class="form-label">Domisili</label>
                                        <input class="form-control" type="text" placeholder="Domisili" name="domisili"value="<?= $karyawan->Domisili; ?>">
                                        <label class="form-label">Umur</label>
                                        <input class="form-control" type="text" placeholder="Umur" name="umur" value="<?= $karyawan->Umur; ?>">
                                        <div class="row">
                                            <div class="col-md-6 align-self-center">
                                                <a href="<?= site_url('karyawan')?>" class="btn btn-danger" type="button" style="width: 127.1625px;height: 43px;margin: 17px;color: white;">Cancel</a>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-primary float-end" type="submit" style="width: 127.1625px;height: 43px;margin: 17px;">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>