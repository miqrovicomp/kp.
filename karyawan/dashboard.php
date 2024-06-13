<?php
include_once __DIR__ . '/../layout/status_login.php';
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_karyawan.php';
include_once __DIR__ . '/../layout/colom-dataCard.php';
include_once __DIR__ . '/../layout/popUp.php';
?>

 
<style>
    body {
    padding-top: 50px; /* Sesuaikan nilai dengan tinggi navbar Anda */
    overflow-y: auto; /* Memungkinkan scroll pada body jika konten melebihi ketinggian layar */
}
.btn{
            background-color: #DCDCDC; /* Ganti dengan warna yang Anda inginkan */
            color: white;
            border: none;
            width: 99%;
    }
</style>
<div class="main-panel">
    <div class="content">
                <section class="section">
                    <div class="section-header">
                    </div>
                    <div class="column">
                      <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                              <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                              </div>
                              <div class="card-wrap">
                                <div class="card-header">
                                  <h5><i class="nc-icon">BARANG</i></h5>
                                </div>
                                <div class="card-body">
                                  <?= $jumlah_barang?>
                                  <br>
                                    
                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="card card-statistic-1">
                            <div class="card-icon bg-secondary">
                              <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                <h5><i class="nc-icon">BARANG MASUK</i></h5>
                              </div>
                              <div class="card-body">
                              <?= $jumlah_barang_masuk?>
                              <br>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                              <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                <h5><i class="nc-icon">BARANG KELUAR</i></h5>
                              </div>
                              <div class="card-body">
                              <?= $jumlah_barang_keluar?>
                              <br>
                                    
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                              <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                <h5><i class="nc-icon">PENGADUAN SERVICE</i></h5>
                              </div>
                              <div class="card-body">
                              <?= $jumlah_pengaduan_perbaikan?>
                              <br>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                              <div class="card-icon bg-dark">
                                <i class="far fa-user"></i>
                              </div>
                              <div class="card-wrap">
                                <div class="card-header">
                                  <h5><i class="nc-icon">KARYAWAN</i></h5>
                                </div>
                                <div class="card-body">
                                <?= $total_karyawan?>
                                <br>
                                   
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                              <div class="card-icon bg-info">
                                <i class="far fa-user"></i>
                              </div>
                              <div class="card-wrap">
                                <div class="card-header">
                                  <h5><i class="nc-icon">TEKNISI</i></h5>
                                </div>
                                <div class="card-body">
                                <?= $total_teknisi?>
                                <br>
                                   
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                              <div class="card-icon bg-dark">
                                <i class="far fa-user"></i>
                              </div>
                              <div class="card-wrap">
                                <div class="card-header">
                                  <h5><i class="nc-icon">POLI</i></h5>
                                </div>
                                <div class="card-body">
                                <?= $jumlah_poli?>
                                <br>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                          
                      </div>
                    </div>
                  </section>
            </div><!-- End body -->
            <?php
           
           include_once ('../layout/footer.php');
            ?>
        </div>