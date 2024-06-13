 
<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_admin.php';

 
?>

                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                 
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Add Karyawan</h4>
                                        </div>
                                        <div class="card-body">
                                        <form action="simpan_karyawan.php" method="post">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="text" class="form-control" id="nik" name="nik" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required autocomplete="off">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="id_pengguna">ID Pengguna</label>
                                                <input type="text" class="form-control" id="id_pengguna" name="id_pengguna" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
              include_once ('../layout/footer.php');
           ?>