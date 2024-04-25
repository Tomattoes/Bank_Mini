<!-- Content Header (Page header) -->
<div class="content-header">
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>assets/aset/user2.jfif" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?= $pengguna['nm_pg']; ?></h3>

            <p class="text-muted text-center"><?= $pengguna['email']; ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>NIS</b> <a class="float-right"><?= $pengguna['id_pengguna']; ?></a>
              </li>
              <li class="list-group-item">
                <b>Kelas</b> <a class="float-right"><?= $kj['nm_kelas']; ?></a>
              </li>
              <li class="list-group-item">
                <b>Jurusan</b> <a class="float-right"><?= $kj['nm_jurusan']; ?></a>
              </li>
            </ul>

            <a href="<?= base_url(); ?>user" class="btn btn-primary btn-block"><b>Done</b></a> 
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-9">
        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Me</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fa-regular fa-credit-card"></i> No Rekening</strong>

            <p class="text-muted">
              <?= $pengguna['no_rek']; ?>
            </p>

            <hr>

            <strong><i class="fa-solid fa-mobile-screen-button"></i> Handphone</strong>

            <p class="text-muted"><?= $pengguna['no_hp']; ?></p>

            <hr>

            <strong><i class="fa-solid fa-user-group"></i> Nama Orang Tua</strong>

            <p class="text-muted">
              <?= $pengguna['nm_ortu']; ?>
            </p>

            <hr>

            <strong><i class="fa-solid fa-location-dot"></i> Alamat</strong>

            <p class="text-muted"><?= $pengguna['alamat']; ?></p>

            <hr>

            <strong><i class="fa-regular fa-calendar-check"></i> Sejak</strong>

            <p class="text-muted"><?= date('d F Y', $pengguna['date_created']) ?></p>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>