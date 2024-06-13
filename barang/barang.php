<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_admin.php';

 

$result = mysqli_query($conn, "SELECT barang.id_barang, barang.id_poli, poli.nama_poli, barang.nama_barang, barang.jumlah_barang
FROM barang
INNER JOIN poli ON barang.id_poli = poli.id_poli;
");

?>
                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                    <div class="card">
                                        <b><div class="card-header bg-light text-black ">
                                        Data Barang
                                            </div> </b>
                                        <div class="card-body">
                                        <table class="table table-hover table-striped " id="table-1">
                                        <thead>
                                            <tr>
                                            <th>No</th>    
                                            <th>POli</th>
                                            <th>Barang</th>
                                            <th>Jummlah Barang</th>
                                            <th >Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>   
                                        <?php
                                        while ($data = mysqli_fetch_array($result)) :
                                        ?>
    
                                        <tr >
                                        <td><?= $data['id_barang'] ?></td>    
                                        <td><?= $data['nama_poli'] ?></td>
                                        <td><?= $data['nama_barang'] ?></td>
                                        <td><?= $data['jumlah_barang'] ?></td>
                                        <td class="button-group">
                                        <a class='btn btn-sm btn-success mb-md-0  mr-1' href='detail.php'>Detail</a>
                                        <a class='btn btn-sm btn-warning mb-md-0  mr-1' href='edit.php?id=<?= $data["id"]; ?>'>Update</a>
                                        <a class='btn btn-sm btn-danger mb-md-0  mr-1' href='delete.php?id_barang=<?= $data["id_barang"]; ?>'>Delete</a>
                                        </td>
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
            require_once '../layout/footer.php';
           ?>
  
