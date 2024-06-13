<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/status_login.php';
include_once __DIR__ . '/../layout/top_teknisi.php';
include_once __DIR__ . '/../layout/colom-dataCard.php';
include_once __DIR__ . '/../teknisi/get_data.php';
 

?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                    <div class="card">
                                        <div class="row">
                                        <div class="col-sm-12">
                                          <div class="card">
                                          <b><div class="card-header bg-light text-black ">
                                          Edit Data
                                            </div> </b>
                                            <div class="card-body">                                
                                              <div class="container">

                                              <form action="../teknisi/update_data.php" method="post">
                                              <input type="hidden" name="id_pengaduan_perbaikan" value="<?= $data['id_pengaduan_perbaikan'] ?>">
                                                <label for="tgl_pengaduan_perbaikan">Tanggal Pengaduan Perbaikan:</label>
                                                <input type="date" name="tgl_pengaduan_perbaikan" class="form-control" value="<?= $data['tgl_pengaduan_perbaikan'] ?>" disabled ><br>

                                                <label for="nama_karyawan">Nama Karyawan:</label>
                                                <input type="text" name="nama_karyawan" class="form-control" value="<?= $data['nama_karyawan'] ?>" disabled><br>

                                                <label for="nama_barang">Nama Barang:</label>
                                                <input type="text" name="nama_barang" class="form-control" value="<?= $data['nama_barang'] ?>" disabled><br>

                                                <label for="keterangan">Keterangan:</label>
                                                <input type="text" name="keterangan" class="form-control" value="<?= $data['keterangan'] ?>" ><br>

                                                <label for="jumlah">Jumlah:</label>
                                                <input type="number" name="jumlah" class="form-control" value="<?= $data['jumlah'] ?>"  ><br>

                                                <label for="tgl_pengerjaan">Tanggal Pengerjaan:</label>
                                                <input type="date" name="tgl_pengerjaan" class="form-control" value="<?= $data['tgl_pengerjaan'] ?>" ><br>

                                                <label for="status" >Status:</label>
                                                <select name="status" class="form-control">
                                                <option value="Proses" <?= $data['status'] == 'Proses' ? 'selected' : '' ?>>Proses</option>
                                                <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                                </select><br>

                                                <input type="submit" class="btn btn-success" value="Update">
                                            </form>

                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               

                <script>
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: '../karyawan/get_all_karyawan.php',
                success: function(response) {
                    console.log(response); // Tambahkan ini untuk melihat data di console
                    response.forEach(function(karyawan) {
                        $('#id_karyawan').append(new Option(karyawan.nama, karyawan.id_karyawan));
                    });
                },
                error: function() {
                    alert('Gagal mengambil daftar karyawan');
                }
            });
        });
    </script>
  


