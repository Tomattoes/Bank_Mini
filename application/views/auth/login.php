<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <img src="<?= base_url(); ?>assets/aset/logo1.jpg" alt="Logo_MW_Bank" height="120" width="240">
        </div>
        <div class="card-body">

            <form action="<?= base_url(); ?>auth" method="post">
                <?= $this->session->flashdata('message'); ?>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" autofocus value="<?= set_value('username'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <small class="form-text text-danger"><?= form_error('email'); ?></small>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <small class="form-text text-danger"><?= form_error('password'); ?></small>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Log In</button>
                    </div>
                </div>
            </form>

            <p class="mb-1">
                <a href="<?= base_url(); ?>auth/forget_password">Lupa kata sandi <i class="fa-solid fa-lock"></i></a>
            </p>
            <p class="mb-0">
                <a href="<?= base_url(); ?>auth/registration" class="text-center">Daftar membership baru <i class="fa-solid fa-user"></i></a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->