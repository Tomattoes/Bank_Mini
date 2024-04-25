<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $h1; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>cs">Home</a></li>
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
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Kelas</th>
                                        <th>No Rekening</th>
                                        <th>Nama Ortu</th>
                                        <th>No Hp</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengguna1 as $p) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p['id_pengguna']; ?></td>
                                            <td><?= $p['nm_pg']; ?></td>
                                            <td><?= $p['email']; ?></td>
                                            <td><?= $p['nm_kelas']; ?>-<?= $p['nm_jurusan']; ?></td>
                                            <td><?= $p['no_rek']; ?></td>
                                            <td><?= $p['nm_ortu']; ?></td>
                                            <td><?= $p['no_hp']; ?></td>
                                            <td><?= $p['alamat']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edit<?= $p['id_pengguna']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                                <a href="<?= base_url(); ?>cs/hapus/<?= $p['id_pengguna']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa-solid fa-trash-can"></i></a>
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
                        <form method="POST" enctype="multipart/form-data" action="<?= base_url(); ?>Cs/add">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="text" name="nis" class="form-control" id="nis" placeholder="NIS" autofocus value="<?= set_value('nis'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('nis'); ?></small>
                                <div class="form-group">
                                    <label for="nm_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nm_lengkap" class="form-control" id="nm_lengkap" placeholder="Nama Lengkap" value="<?= set_value('nm_lengkap'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('nm_lengkap'); ?></small>
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
                                    <label for="kelas">Kelas</label>
                                    <select type="text" class="form-control" placeholder="Kelas" id="kelas" name="kelas">
                                        <option value="<?= set_value('kelas'); ?>">Pilih Kelas</option>
                                        <?php foreach ($kelas1 as $k) : ?>
                                            <option value="<?= $k['id_kelas']; ?>"><?= $k['nm_kelas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select type="text" class="form-control" placeholder="Jurusan" id="jurusan" name="jurusan">
                                        <option value="<?= set_value('jurusan'); ?>">Pilih Jurusan</option>
                                        <?php foreach ($jurusan as $j) : ?>
                                            <option value="<?= $j['id_jurusan']; ?>"><?= $j['nm_jurusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>
                                <div class="form-group">
                                    <label for="nm_ortu">Nama Orang Tua</label>
                                    <input type="text" name="nm_ortu" class="form-control" id="nm_ortu" placeholder="Nama Orang Tua" value="<?= set_value('nm_ortu'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('nm_ortu'); ?></small>
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
                                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <?php
        $no = 1;
        foreach ($pengguna1 as $p) : ?>
            <div class="modal" id="edit<?= $p['id_pengguna']; ?>">
                <div class="modal-dialog modal-xs">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa-solid fa-user-pen"></i> <?= $m2; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="<?= base_url(); ?>Cs/edit">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input type="text" name="nis" class="form-control" id="nis" value="<?= $p['id_pengguna']; ?>" readonly>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('nis'); ?></small>
                                    <div class="form-group">
                                        <label for="nm_lengkap">Nama Lengkap</label>
                                        <input type="text" name="nm_lengkap" class="form-control" id="nm_lengkap" value="<?= $p['nm_pg']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('nm_lengkap'); ?></small>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select class="form-control" id="kelas" name="kelas">
                                            <?php foreach ($kelas1 as $k) : ?>
                                                <?php if ($k['id_kelas'] == $pengguna1['kelas_id']) : ?>
                                                    <option value="<?= $k['id_kelas']; ?>" selected><?= $k['nm_kelas']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $k['id_kelas']; ?>"><?= $k['nm_kelas']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
                                    <div class="form-group">
                                        <label for="jurusan">Jurusan</label>
                                        <select class="form-control" id="jurusan" name="jurusan">
                                            <?php foreach ($jurusan as $j) : ?>
                                                <?php if ($j['id_jurusan'] == $pengguna1['jurusan_id']) : ?>
                                                    <option value="<?= $j['id_jurusan']; ?>" selected><?= $j['nm_jurusan']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $j['id_jurusan']; ?>"><?= $j['nm_jurusan']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>
                                    <div class="form-group">
                                        <label for="nm_ortu">Nama Orang Tua</label>
                                        <input type="text" name="nm_ortu" class="form-control" id="nm_ortu" value="<?= $p['nm_ortu']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('nm_ortu'); ?></small>
                                    <div class="form-group">
                                        <label for="no_hp">No Hp</label>
                                        <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= $p['no_hp']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $p['alamat']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                </div>
                                <!-- /.card-body -->

                                <div class="modal-footer right-content-between">
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-rotate-left"></i> Kembali</button>
                                    <button type="submit" name="simpan" class="btn btn-warning"><i class="fa-regular fa-floppy-disk"></i> Kirim Ajuan Perubahan</button>
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