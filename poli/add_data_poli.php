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
                                        <div class="row">
                                        <div class="col-sm-12">
                                          <div class="card">
                                          <b><div class="card-header bg-light text-black ">
                                          Add Data Poli
                                            </div> </b>
                                            <div class="card-body">                                
                                              <div class="container">
                                                    <form action="../poli/simpan_add_data_poli.php" method="post">
                                                    <div class="form-group">
                                                        <label for="nama_poli">Nama Poli</label>
                                                        <input type="text" class="form-control" id="nama_poli" name="nama_poli" required>
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
            <?php
            require_once '../layout/footer.php';
           ?>
  
