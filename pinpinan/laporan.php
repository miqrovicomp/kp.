<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/status_login.php';
include_once __DIR__ . '/../layout/top_pinpinan.php';
?>
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
                                           Laporan
                                            </div> </b>
                                            <div class="card-body">                                
                                            <a class="btn btn-primary" href="../pinpinan/barang_masuk.php" role="button">Barang Masuk</a>
                                            <a class="btn btn-success" href="../pinpinan/barang_keluar.php" role="button">Barang Keluar</a>
                                            <a class="btn btn-warning" href="../pinpinan/pengaduan_services.php" role="button">Pengaduan Services</a>
                                            <a class="btn btn-info" href="../pinpinan/index.php" role="button">Dowloads All</a>
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
  
