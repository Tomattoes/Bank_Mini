<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $h1; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>Teller">Home</a></li>
                        <li class="breadcrumb-item active"><?= $h2; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="" method="POST">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa-solid fa-money-check-dollar" style="color: #ffd43b;"></i> <?= $ht; ?></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Masukkan NIS Siswa</label>
                                    <select name="id_pengguna" id="id_pengguna" class="form-control select2" style="width: 100%;">
                                        <option value="">-- Pilih Siswa --</option>
                                        <?php
                                        $no = 1;
                                        foreach ($siswa as $s) : ?>
                                            <option value="<?= $s['id_pengguna']; ?>"><?= $s['id_pengguna']; ?> - <?= $s['nm_pg']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Saldo Tabungan</label>
                                    <input type="text" name="saldo" id="saldo" class="form-control" placeholder="Saldo" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Penarikan</label>
                                    <input type="text" name="setor" id="setor" class="form-control" placeholder="Jumlah Penarikan" required>
                                </div>
                                <input type="hidden" name="petugas" id="petugas" class="form-control" value="<?= $pengguna['nm_pg']; ?>">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="ket" id="ket" class="form-control" placeholder="Keterangan" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?= base_url(); ?>teller/penarikan" class="btn btn-danger"><i class="fa-solid fa-rotate-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary" name="tambah"><i class="fa-regular fa-floppy-disk"></i> simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>