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
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <table border="0">
                            <tr>
                                <td rowspan="2">
                                    <h4>
                                        <i class="icon fa fa-info"></i>
                                    </h4>
                                </td>
                                <td>
                                    <h4> Total Setoran </h4>
                                </td>
                                <td>
                                    <h4> : </h4>
                                </td>
                                <td>
                                    <?php
                                    foreach ($totalSetoran as $st) : ?>
                                        <h4>
                                             <?= $st['Setoran']; ?>
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
            </div>
            <div class="row">
                <div class="col-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa-solid fa-sack-dollar" style="color: #ffd43b;"></i> <?= $ht; ?></h3>
                            <a href="<?= base_url(); ?>teller/addSetoran" class="btn btn-primary btn-sm float-right"><i class="fa-solid fa-plus"></i> Tambah Data</a>
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
                                        <th>Debit</th>
                                        <th>Teller</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($tabungan as $tb) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $tb['id_pengguna']; ?></td>
                                            <td><?= $tb['nm_pg']; ?></td>
                                            <td><?= $tb['nm_kelas']; ?>-<?= $tb['nm_jurusan']; ?></td>
                                            <td><?= $tb['no_rek']; ?></td>
                                            <td><?php echo date('d F Y', $tb['tanggal']) ?></td>
                                            <td><?= $tb['debit']; ?></td>
                                            <td><?= $tb['petugas']; ?></td>

                                            <td>
                                                <a href="<?= base_url(); ?>teller/editSetoran/<?= $tb['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                                <a href="<?= base_url(); ?>teller/hapusSetoran/<?= $tb['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa-solid fa-trash-can"></i></a>
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