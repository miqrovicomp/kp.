<?php
include_once __DIR__ . '/../layout/status_login.php';
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_karyawan.php';
include_once __DIR__ . '/../layout/colom-dataCard.php';
include_once __DIR__ . '/../layout/popUp.php';


 
// Ambil nama karyawan dari sesi
$username = isset($_SESSION['username']);
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
                                          Pengaduan Services
                                            </div> </b>
                                            <div class="card-body">                                
                                              <div class="container">
                                                    <form action="../karyawan/simpan_pengaduan_services.php" method="post">
                                                    <div class="form-group">
                                                    <label for="tgl_pengaduan_perbaikan">Tanggal Pengaduan Perbaikan</label>
                                                    <input type="date" class="form-control" id="tgl_pengaduan_perbaikan" name="tgl_pengaduan_perbaikan" required readonly >
                                                </div>
                 
                                                <div class="form-group">
                                                    <label for="id_barang">ID Barang</label>
                                                    <input type="number" class="form-control" id="id_barang" name="id_barang" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan</label>
                                                    <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah</label>
                                                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                                </div>
                                                      <br>
                                                      <button type="submit" name="submit"  class="btn btn-success">Simpan</button>
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
               

                <!--Tanggal otomastis-->
                <script>
                    document.addEventListener('DOMContentLoaded', (event) => {
                    // Mendapatkan elemen input tanggal
                    const tglInput = document.getElementById('tgl_pengaduan_perbaikan');

                    // Membuat objek tanggal untuk tanggal saat ini
                    const today = new Date();

                    // Membentuk string tanggal dalam format YYYY-MM-DD
                    const year = today.getFullYear();
                    const month = String(today.getMonth() + 1).padStart(2, '0');
                    const day = String(today.getDate()).padStart(2, '0');
                    const formattedDate = `${year}-${month}-${day}`;

                    // Mengisi nilai input dengan tanggal saat ini
                    tglInput.value = formattedDate;
                });
                </script><!-- End Tanggal otomastis-->

                 
                
  


