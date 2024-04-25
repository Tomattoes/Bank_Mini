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
                            <h3 class="card-title"><i class="fa-solid fa-user-group"></i> <?= $ht; ?></h3>
                            <a data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm float-right"><i class="fa-solid fa-user-plus"></i> Tambah <?= $t; ?></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id CS</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Hp</th>
                                        <th>No Rekening</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($customer as $cs) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $cs['id_pengguna']; ?></td>
                                            <td><?= $cs['nm_pg']; ?></td>
                                            <td><?= $cs['email']; ?></td>
                                            <td><?= $cs['no_hp']; ?></td>
                                            <td><?= $cs['no_rek']; ?></td>
                                            <td><?= $cs['alamat']; ?></td>
                                            <td><?= date('d F Y', $cs['date_created']) ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edit<?= $cs['id_pengguna']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                                <a href="<?= base_url(); ?>admin/hapusCs/<?= $cs['id_pengguna']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa-solid fa-trash-can"></i></a>
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
                        <form method="POST" enctype="multipart/form-data" action="<?= base_url(); ?>Admin/addCs">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id">Id Customer Service</label>
                                    <input type="text" name="id" class="form-control" id="id" placeholder="ID Customer Service" autofocus value="<?= set_value('id'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('id'); ?></small>
                                <div class="form-group">
                                    <label for="nm">Nama</label>
                                    <input type="text" name="nm" class="form-control" id="nm" placeholder="Nama Lengkap" value="<?= set_value('nm'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('nm'); ?></small>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?= set_value('password'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('password'); ?></small>
                                <div class="form-group">
                                    <label for="no_hp">No Hp</label>
                                    <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No Hp" value="<?= set_value('no_hp'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
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
        foreach ($customer as $cs) : ?>
            <div class="modal" id="edit<?= $cs['id_pengguna']; ?>">
                <div class="modal-dialog modal-xs">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa-solid fa-user-pen"></i> <?= $m2; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="<?= base_url(); ?>Admin/editCs">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="id">ID Customer Service</label>
                                        <input type="text" name="id" class="form-control" id="id" value="<?= $cs['id_pengguna']; ?>" readonly>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('id'); ?></small>
                                    <div class="form-group">
                                        <label for="nm">Nama</label>
                                        <input type="text" name="nm" class="form-control" id="nm" value="<?= $cs['nm_pg']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('nm'); ?></small>
                                    <div class="form-group">
                                        <label for="no_hp">No Hp</label>
                                        <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= $cs['no_hp']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $cs['alamat']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
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