  <div class="register-box">
      <div class="card card-outline card-success">
          <div class="card-header text-center">
              <img src="<?= base_url(); ?>assets/aset/logo1.jpg" alt="Logo_MW_Bank" height="120" width="240">
          </div>
          <div class="card-body">

              <form action="<?= base_url(); ?>auth/registration" method="post">
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" autofocus value="<?= set_value('nis'); ?>">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fa-solid fa-id-card"></i>
                          </div>
                      </div>
                  </div>
                  <small class="form-text text-danger"><?= form_error('nis'); ?></small>
                  <div class="input-group mb-3">
                      <input type="text" id="name" name="name" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fas fa-user"></i>
                          </div>
                      </div>
                  </div>
                  <small class="form-text text-danger"><?= form_error('name'); ?></small>
                  <div class="input-group mb-3">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fas fa-envelope"></i>
                          </div>
                      </div>
                  </div>
                  <small class="form-text text-danger"><?= form_error('email'); ?></small>
                  <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Password" id="password1" name="password1">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fas fa-lock"></i>
                          </div>
                      </div>
                  </div>
                  <small class="form-text text-danger"><?= form_error('password1'); ?></small>
                  <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Tulis Ulang Password" id="password2" name="password2">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fas fa-lock"></i>
                          </div>
                      </div>
                  </div>
                  <small class="form-text text-danger"><?= form_error('password2'); ?></small>
                  <div class="input-group mb-3">
                      <select type="text" class="form-control" placeholder="Kelas" id="kelas" name="kelas">
                          <option value="<?= set_value('kelas'); ?>">Pilih Kelas</option>
                          <?php foreach ($kelas1 as $k) : ?>
                              <option value="<?= $k['id_kelas']; ?>"><?= $k['nm_kelas']; ?></option>
                          <?php endforeach; ?>
                      </select>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fa-solid fa-chalkboard-user"></i>
                          </div>
                      </div>
                  </div>
                  <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
                  <div class="input-group mb-3">
                      <select type="text" class="form-control" placeholder="Jurusan" id="jurusan" name="jurusan">
                          <option value="<?= set_value('jurusan'); ?>">Pilih Jurusan</option>
                          <?php foreach ($jurusan as $j) : ?>
                              <option value="<?= $j['id_jurusan']; ?>"><?= $j['nm_jurusan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fa-solid fa-graduation-cap"></i>
                          </div>
                      </div>
                  </div>
                  <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Nama Orang Tua" id="nama_ortu" name="nama_ortu" value="<?= set_value('nama_ortu'); ?>">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fa-solid fa-user-group"></i>
                          </div>
                      </div>
                  </div>
                  <small class="form-text text-danger"><?= form_error('nama_ortu'); ?></small>
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="No HP" id="no_hp" name="no_hp" value="<?= set_value('no_hp'); ?>">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fa-solid fa-phone"></i>
                          </div>
                      </div>
                  </div>
                  <small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fa-solid fa-landmark"></i>
                          </div>
                      </div>
                  </div>
                  <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                  <div class="row">
                      <button type="submit" class="btn btn-success btn-block">Register</button>
                  </div>
              </form>
              <a href="<?= base_url(); ?>auth" class="text-center">Sudah punya akun ? <i class="fas fa-user"></i></a>
          </div>
          <!-- /.form-box -->
      </div><!-- /.card -->
  </div>