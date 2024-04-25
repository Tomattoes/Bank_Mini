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
            <h3 class="card-title"><i class="fa-solid fa-pen-to-square" style="color: #3462b2;"></i> <?= $ht; ?></h3>

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
                <input type="hidden" name="id" value="<?= $tabungan['id']; ?>">
                <label>NIS - No Rekening</label>
                  <input type="text" name="nis" id="nis" class="form-control" readonly value="<?= $tabungan['id_pengguna']; ?> - <?= $tabungan['no_rek']; ?>">
                </div>
                <div class="form-group">
                  <label>Nama Siswa</label>
                  <input type="text" name="nama" id="nama" class="form-control" readonly value="<?= $tabungan['nm_pg']; ?>">
                </div>
                <div class="form-group">
                  <label>Setoran</label>
                  <input type="text" name="setor" id="setor" class="form-control" placeholder="Jumlah setoran" value="<?= $tabungan['debit']; ?>">
                </div>
                <input type="hidden" name="petugas" id="petugas" class="form-control" value="<?= $pengguna['nm_pg']; ?>">
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <a href="<?= base_url(); ?>teller/setoran" class="btn btn-danger"><i class="fa-solid fa-rotate-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary" name="tambah"><i class="fa-regular fa-floppy-disk"></i> simpan</button>
          </div>
        </div>
      </form>
    </div>

  </section>
  <!-- /.content -->
</div>