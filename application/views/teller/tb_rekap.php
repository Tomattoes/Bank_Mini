<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $h1; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>teller">Home</a></li>
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
                            <h3 class="card-title"><i class="fas fa-tasks"></i> <?= $ht1; ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>No Rekening</th>
                                        <th>Kelas</th>
                                        <th>Debit</th>
                                        <th>Tanggal</th>
                                        <th>Teller</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($rekap as $r) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $r['id_pengguna']; ?></td>
                                            <td><?= $r['nm_pg']; ?></td>
                                            <td><?= $r['no_rek']; ?></td>
                                            <td><?= $r['nm_kelas']; ?>-<?= $r['nm_jurusan']; ?></td>
                                            <td><?= $r['debit']; ?></td>
                                            <td><?php echo date('d F Y', $r['tanggal']) ?></td>
                                            <td><?= $r['petugas']; ?></td>
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-tasks"></i> <?= $ht2; ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>No Rekening</th>
                                        <th>Kelas</th>
                                        <th>Kredit</th>
                                        <th>Tanggal</th>
                                        <th>Teller</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($rekap1 as $r) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $r['id_pengguna']; ?></td>
                                            <td><?= $r['nm_pg']; ?></td>
                                            <td><?= $r['no_rek']; ?></td>
                                            <td><?= $r['nm_kelas']; ?>-<?= $r['nm_jurusan']; ?></td>
                                            <td><?= $r['kredit']; ?></td>
                                            <td><?php echo date('d F Y', $r['tanggal']) ?></td>
                                            <td><?= $r['petugas']; ?></td>
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