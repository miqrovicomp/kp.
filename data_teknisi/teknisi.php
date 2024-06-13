<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_admin.php';

$result = mysqli_query($conn, "SELECT * from teknisi;
");
?>

                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                <td class="button-group">
                                    <a class='btn btn-sm btn-Success mb-md-3 mr-10  ' href='../data_teknisi/add_data_teknisi.php'>Tambah Data</a>
                                </td>
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Teknisi</h4>
                                        </div>
                                        <div class="card-body">
                                        <table class="table table-hover table-striped w-100" id="table-1">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>nama</th>
                                            <th>Alamat</th>
                                            <th>no Telepon</th>
                                            <th style="width: 150">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                                        <?php
                                        while ($data = mysqli_fetch_array($result)) :
                                        ?>
    
                                        <tr>
                                        <td><?= $data['id_teknisi'] ?></td>
                                        <td><?= $data['nama_teknisi'] ?></td>
                                        <td><?= $data['alamat'] ?></td>
                                        <td><?= $data['no_telepon'] ?></td> 
                                        <td>
                                        </tr>
                                        <?php
                                        endwhile;
                                        ?>
                                        </tbody>
                                        </table>
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