<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $h1; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>Admin">Home</a></li>
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
                            <h3 class="card-title"><i class="fa-solid fa-graduation-cap"></i> <?= $ht; ?></h3>
                            <a data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm float-right"><i class="fa-solid fa-plus"></i> Tambah <?= $t; ?></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Jurusan</th>
                                        <th>Nama Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jurusan as $j) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $j['id_jurusan']; ?></td>
                                            <td><?= $j['nm_jurusan']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edit<?= $j['id_jurusan']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                                <a href="<?= base_url(); ?>admin/hapusJurusan/<?= $j['id_jurusan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa-solid fa-trash-can"></i></a>
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

        <div class="modal" id="tambah">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa-solid fa-user-plus"></i> <?= $m1; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" action="<?= base_url(); ?>Admin/addJurusan">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id">Id Jurusan</label>
                                    <input type="text" name="id_jurusan" class="form-control" id="id" placeholder="ID Jurusan" value="<?= set_value('id_jurusan'); ?>" autofocus>
                                </div>
                                <small class="form-text text-danger"><?= form_error('id_jurusan'); ?></small>
                                <div class="form-group">
                                    <label for="nm_jurusan">Nama Jurusan</label>
                                    <input type="text" name="nm_jurusan" class="form-control" id="nm_jurusan" placeholder="Nama Jurusan" value="<?= set_value('nm_jurusan'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('nm_jurusan'); ?></small>
                            </div>
                            <!-- /.card-body -->

                            <div class="modal-footer right-content-between">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-rotate-left"></i> Kembali</button>
                                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <?php
        $no = 1;
        foreach ($jurusan as $j) : ?>
            <div class="modal" id="edit<?= $j['id_jurusan']; ?>">
                <div class="modal-dialog modal-xs">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa-solid fa-user-pen"></i> <?= $m2; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="<?= base_url(); ?>Admin/editJurusan">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="id">Id Jurusan</label>
                                        <input type="text" name="id" class="form-control" id="id" value="<?= $j['id_jurusan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nm_jurusan">Nama Jurusan</label>
                                        <input type="text" name="nm_jurusan" class="form-control" id="nm_jurusan" value="<?= $j['nm_jurusan']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('nm_jurusan'); ?></small>
                                </div>
                                <!-- /.card-body -->

                                <div class="modal-footer right-content-between">
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-rotate-left"></i> Kembali</button>
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </section>
    <!-- /.content -->
</div>