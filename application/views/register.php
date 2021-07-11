<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(<?= base_url('assets/img/dogs/register.jpg')?>);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Buat Akun Baru</h4>
                            </div>
                            <?php
                                $errors = $this->session->flashdata('errors');
                                if(!empty($errors)){
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="alert alert-danger text-center">
                                        <?php foreach($errors as $key=>$error){ ?>
                                        <?php echo "$error<br>"; ?>
                                        <?php } ?>
                                    </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <form class="user" action="<?= site_url('auth/proses_register'); ?>" method="post">
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Nama Depan" name="first_name" required autofocus>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Nama Belakang" name="last_name" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Alamat Email" name="email" required>
                                </div>
                                <div class="mb-3">
                                        <input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password" required>
                                </div>
                                <button class="btn btn-primary d-block btn-user w-100" type="submit">Register Akun</button>
                                <hr>
                                <hr>
                            </form>
                            <div class="text-center"></div>
                            <div class="text-center"><a class="small" href="<?= site_url('auth/login')?>">Sudah punya akun? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>