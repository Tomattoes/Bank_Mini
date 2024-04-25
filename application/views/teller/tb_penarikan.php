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
                <div class="col-md">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <table border="0">
                            <tr>
                                <td rowspan="2">
                                    <h4>
                                        <i class="icon fa fa-info"></i>
                                    </h4>
                                </td>
                                <td>
                                    <h4> Total Penarikan </h4>
                                </td>
                                <td>
                                    <h4> : </h4>
                                </td>
                                <td>
                                    <?php
                                    foreach ($totalPenarikan as $tr) : ?>
                                        <h4>
                                            <?= $tr['Penarikan']; ?>
                                        </h4>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4> Total Bulan Ini </h4>
                                </td>
                                <td>
                                    <h4>
                                        :
                                    </h4>
                                </td>
                                <td>
                                    <h4>

                                    </h4>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa-solid fa-hand-holding-dollar" style="color: #ffd43b;"></i> <?= $ht; ?></h3>
                            <a href="<?= base_url(); ?>teller/addPenarikan" class="btn btn-primary btn-sm float-right"><i class="fa-solid fa-plus"></i> Tambah Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>No Rekening</th>
                                        <th>Tanggal</th>
                                        <th>Kredit</th>
                                        <th>Keterangan</th>
                                        <th>Teller</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($penarikan as $pe) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pe['id_pengguna']; ?></td>
                                            <td><?= $pe['nm_pg']; ?></td>
                                            <td><?= $pe['nm_kelas']; ?>-<?= $pe['nm_jurusan']; ?></td>
                                            <td><?= $pe['no_rek']; ?></td>
                                            <td><?php echo date('d F Y', $pe['tanggal']) ?></td>
                                            <td><?= $pe['kredit']; ?></td>
                                            <td><?= $pe['keterangan']; ?></td>
                                            <td><?= $pe['petugas']; ?></td>

                                            <td>
                                                <a href="<?= base_url(); ?>teller/editPenarikan/<?= $pe['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                                <a href="<?= base_url(); ?>teller/hapusPenarikan/<?= $pe['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa-solid fa-trash-can"></i></a>
                                            </td>
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