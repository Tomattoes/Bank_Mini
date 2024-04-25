<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $h1; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>pimpinan">Home</a></li>
                        <li class="breadcrumb-item active"><?= $h2; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa-solid fa-user-group"></i> <?= $ht; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Rekening</th>
                                        <th>No Hp</th>
                                        <th>Alamat</th>
                                        <th>Sejak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($teller as $t) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $t['id_pengguna']; ?></td>
                                            <td><?= $t['nm_pg']; ?></td>
                                            <td><?= $t['email']; ?></td>
                                            <td><?= $t['no_rek']; ?></td>
                                            <td><?= $t['no_hp']; ?></td>
                                            <td><?= $t['alamat']; ?></td>
                                            <td><?= date('d F Y', $t['date_created']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

    </section>
    <!-- /.content -->
</div>