<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_admin.php';
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
                                          Add Barang Keluar
                                            </div> </b>
                                            <div class="card-body">                                
                                              <div class="container">
                                                    <form action="../barang/simpan_barang_keluar.php" method="post">
                                                    <label for="tgl_keluar">Tanggal Keluar:</label><br>
                                                    <input type="date" id="tgl_keluar" name="tgl_keluar" class="form-control" required><br> 
                                                    
                                                    <label for="id_poli">ID Poli:</label><br>
                                                    <input type="number" id="id_poli" name="id_poli" class="form-control"  required><br> 
                                                    
                                                    <label for="nama_barang">Nama Barang:</label><br>
                                                    <input type="text" id="nama_barang" name="nama_barang" class="form-control" autocomplete="off" required><br> 
                                                    
                                                    <label for="jumlah_barang">Jumlah Barang:</label><br>
                                                    <input type="number" id="jumlah_barang" name="jumlah_barang" class="form-control"  autocomplete="off" required><br> 
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
            <?php
            require_once '../layout/footer.php';
           ?>

            <!--Tanggal otomastis-->
            <script>
                    document.addEventListener('DOMContentLoaded', (event) => {
                    // Mendapatkan elemen input tanggal
                    const tglInput = document.getElementById('tgl_keluar');

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
  
