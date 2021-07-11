<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(<?= base_url('assets/img/dogs/login.jpg')?>);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Selamat Datang Kembali!</h4>
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
                                    <form class="user" action="<?= site_url('auth/proses_login'); ?>" method="post">
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan alamat email" name="email" required autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password" required>
                                        </div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small"></div>
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                        <hr>
                                        <hr>
                                    </form>
                                    <div class="text-center"></div>
                                    <div class="text-center"><a class="small" href="<?= site_url('auth/register')?>">Buat Akun</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>