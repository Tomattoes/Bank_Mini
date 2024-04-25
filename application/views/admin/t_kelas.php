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
                            <h3 class="card-title"><i class="fa-solid fa-chalkboard-user"></i> <?= $ht; ?></h3>
                            <a data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm float-right"><i class="fa-solid fa-plus"></i> Tambah <?= $t; ?></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Kelas</th>
                                        <th>Nama Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kelas1 as $k) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $k['id_kelas']; ?></td>
                                            <td><?= $k['nm_kelas']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edit<?= $k['id_kelas']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                                <a href="<?= base_url(); ?>admin/hapusKelas/<?= $k['id_kelas']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa-solid fa-trash-can"></i></a>
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
                        <form method="POST" enctype="multipart/form-data" action="<?= base_url(); ?>Admin/addKelas">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id">Id Kelas</label>
                                    <input type="text" name="id_kelas" class="form-control" id="id" placeholder="ID Kelas" value="<?= set_value('id_kelas'); ?>" autofocus>
                                </div>
                                <small class="form-text text-danger"><?= form_error('id_kelas'); ?></small>
                                <div class="form-group">
                                    <label for="nm_kelas">Nama Kelas</label>
                                    <input type="text" name="nm_kelas" class="form-control" id="nm_kelas" placeholder="Nama kelas" value="<?= set_value('nm_kelas'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('nm_kelas'); ?></small>
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
        foreach ($kelas1 as $k) : ?>
            <div class="modal" id="edit<?= $k['id_kelas']; ?>">
                <div class="modal-dialog modal-xs">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa-solid fa-user-pen"></i> <?= $m2; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="<?= base_url(); ?>Admin/editKelas">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="id">Id Kelas</label>
                                        <input type="text" name="id" class="form-control" id="id" value="<?= $k['id_kelas']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nm_kelas">Nama Kelas</label>
                                        <input type="text" name="nm_kelas" class="form-control" id="nm_kelas" value="<?= $k['nm_kelas']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('nm_kelas'); ?></small>
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