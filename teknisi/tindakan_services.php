<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_teknisi.php';
include_once __DIR__ . '/../layout/colom-dataCard.php';
 

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
                                          Tindakan Services
                                            </div> </b>
                                            <div class="card-body">                                
                                              <div class="container">
                                                    <form action="../teknisi/simpan_tindakan_services.php" method="post">
                                                    <div class="form-group">
                <label for="id_perbaikan_detail">ID Perbaikan Detail</label>
                <input type="number" class="form-control" id="id_perbaikan_detail" name="id_perbaikan_detail" required>
            </div>
            <div class="form-group">
                <label for="id_pengaduan_perbaikan_detail">ID Pengaduan Perbaikan Detail</label>
                <input type="number" class="form-control" id="id_pengaduan_perbaikan_detail" name="id_pengaduan_perbaikan_detail" required>
            </div>
            <div class="form-group">
                <label for="tgl_proses">Tanggal Proses</label>
                <input type="date" class="form-control" id="tgl_proses" name="tgl_proses" required>
            </div>
            <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" required>
            </div>
            <div class="form-group">
                <label for="id_teknisi">ID Teknisi</label>
                <input type="number" class="form-control" id="id_teknisi" name="id_teknisi" required>
            </div>
            <div class="form-group">
                <label for="analisa">Analisa</label>
                <textarea class="form-control" id="analisa" name="analisa" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="id_rincian_biaya">ID Rincian Biaya</label>
                <input type="number" class="form-control" id="id_rincian_biaya" name="id_rincian_biaya" required>
            </div>
            <div class="form-group">
                <label for="total_biaya">Total Biaya</label>
                <input type="number" class="form-control" id="total_biaya" name="total_biaya" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Selesai">Selesai</option>
                    <option value="Pending">Pending</option>
                </select>
            </div>
                                                      <br>
                                                      <button type="submit" name="submit"  class="btn btn-success">Simpan</button>
                                                      <a class="btn btn-warning" href="#" role="button">Cek Data</a>
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
  


