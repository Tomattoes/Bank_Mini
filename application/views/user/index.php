<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><small> Hi </small><?= $pengguna['nm_pg']; ?></h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><i class="fa-solid fa-sack-dollar" style="color: #ffd43b;"></i> <b>Saldo</b> anda</h5>

            <h2 class="card-text">
              <?php
              if ($tabungan['saldo'] == 0) {
                echo 'Saldo Anda kosong!';
              } else {
                $nilai_mata_uang = $tabungan['saldo'];
                $format_mata_uang = number_format($nilai_mata_uang, 0, ',', '.');
                echo 'Rp ' . $format_mata_uang;
              }
              ?>
            </h2>
            <hr>
            <div class="row">
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow">
                  <span class="info-box-icon bg-info"><i class="fa-solid fa-credit-card"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Rekening</span>
                    <span class="info-box-number"><?= $pengguna['no_rek']; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow">
                  <span class="info-box-icon bg-success"><i class="fa-solid fa-dollar-sign"></i></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Setoran</span>
                    <span class="info-box-number">
                      <?php
                      if ($tabungan['debit'] == 0) {
                        echo 'Anda belum memiliki setoran!';
                      } else {
                        $nilai_mata_uang = $tabungan['debit'];
                        $format_mata_uang = number_format($nilai_mata_uang, 0, ',', '.');
                        echo 'Rp ' . $format_mata_uang;
                      }
                      ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow">
                  <span class="info-box-icon bg-danger"><i class="fa-solid fa-download"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Penarikan</span>
                    <span class="info-box-number">
                      <?php
                      if ($tabungan['kredit'] == 0) {
                        echo 'Anda belum melakukan penarikan!';
                      } else {
                        $nilai_mata_uang = $tabungan['kredit'];
                        $format_mata_uang = number_format($nilai_mata_uang, 0, ',', '.');
                        echo 'Rp ' . $format_mata_uang;
                      }
                      ?>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow">
                  <span class="info-box-icon bg-warning"><i class="fa-solid fa-down-long"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Penarikan Terbanyak</span>
                    <span class="info-box-number">
                      <?php
                      if ($kredit['kredit'] == 0) {
                        echo 'Anda belum melakukan penarikan!';
                      } else {
                        $nilai_mata_uang = $kredit['kredit'];
                        $format_mata_uang = number_format($nilai_mata_uang, 0, ',', '.');
                        echo 'Rp ' . $format_mata_uang;
                      }
                      ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.info-box -->
          </div>
        </div>
      </div>
    </div>

    <!-- /.row -->
  </div>
</div>

<?php if ($tabungan['debit'] > 0) : ?>
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-md-10 col-sm-8 col-8">
          <h1 class="m-0"><small> Transactions </small></h1>
        </div>
        <div class="col-md-2 col-sm-4 col-4">
          <h4 class="m-2"><a href=""><small> View All </small></a></h4>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
  <?php foreach ($tbg as $t) : ?>
    <div class="content">
      <div class="container">
        <div class="row">
          <!-- <?php if ($tbg['jenis'] == "TR") : ?> -->
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-danger"><i class="fa-solid fa-download"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Penarikan</span>
                  <span class="info-box-number"></span>
                </div>
              </div>
            </div>
          <!-- <?php endif; ?> -->
          <!-- <?php if ($tbg['jenis'] == "ST") : ?> -->
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fa-solid fa-upload"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Setoran</span>
                  <span class="info-box-number"></span>
                </div>
              </div>
            </div>
          <!-- <?php endif; ?> -->
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>