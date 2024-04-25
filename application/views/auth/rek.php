<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <img src="<?= base_url(); ?>assets/aset/logo1.jpg" alt="Logo_MW_Bank" height="120" width="240">
        </div>
        <div class="card-body">

            <form action="<?= base_url(); ?>user" method="post">
                <?= $this->session->flashdata('message'); ?>
                <div class="input-group mb-3">
                    <h4><?= $pengguna['no_rek']; ?></h4>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Done</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->