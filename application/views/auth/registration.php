 <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Registrasi</h5>
            <hr class="my-4">
            <form class="form-signin" action="<?= base_url('auth/registration'); ?>" method="post">
              <div class="form-label-group">
                  <input type="tel" name="nik" id="nik" class="form-control" placeholder="NIK" required autofocus>
                  <label for="nik">Masukkan NIK</label>
              </div>
              <div class="form-label-group">
                  <input type="text" id="nama" name="nama"" class="form-control" placeholder="nama" required autofocus>
                  <label for="nama">Masukkan Nama</label>
              </div>
              <div class="form-label-group">
                  <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                  <label for="username">Masukkan Username</label>
              </div>
              <div class="form-label-group">
                  <input type="password" id="password1" name="password1" class="form-control" placeholder="Password" required autofocus>
                  <label for="password1">Masukkan Password</label>
              </div>
              <div class="form-label-group">
                  <input type="password" id="password2" name="password2" class="form-control" placeholder="Konfirmasi Password" required autofocus>
                  <label for="password2">Konfirmasi Password</label>
              </div>
              <div class="form-label-group">
                  <input type="tel" id="telp" name="telp" class="form-control" placeholder="Nomor Telepon" required autofocus>
                  <label for="telp">Masukkan No.Telp</label>
              </div>
              <hr class="my-4">
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Daftar</button>
              <a href="<?= base_url('auth'); ?>">Sudah punya akun? Masuk Sekarang!</a>
            </form>
          </div>
        </div>
      </div>
    </div>