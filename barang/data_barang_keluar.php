<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_admin.php';

 

$result = mysqli_query($conn, "SELECT bk.id_barang_keluar, bk.tgl_keluar, 
bkd.id_barang_keluar_detail, b.nama_barang, 
bkd.jumlah, p.nama_poli 
FROM barang_keluar bk 
JOIN barang_keluar_detail bkd 
ON bk.id_barang_keluar = bkd.id_barang_keluar 
JOIN barang b 
ON bkd.id_barang = b.id_barang 
JOIN poli p 
ON b.id_poli = p.id_poli 
WHERE bk.id_barang_keluar;");

?>
                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                <td class="button-group">
                                    <a class='btn btn-sm btn-Success mb-md-3 mr-10  ' href='../barang/add_barang_keluar.php'>Tambah Data</a>
                                </td>
                                    <div class="card">
                                        <b><div class="card-header bg-light text-black ">
                                        Data Barang Keluar
                                            </div> </b>
                                        <div class="card-body">
                                        <table class="table table-hover table-striped " id="table-1">
                                        <thead>
                                            <tr>
                                            <th>Tgl Barang Keluar</th>
                                            <th>Poli</th>
                                            <th >Nama barang</th>
                                            <th >jumlah</th>
                                            <th >Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                                        <?php
                                        while ($data = mysqli_fetch_array($result)) :
                                        ?>
                                        <tr >
                                        <td><?= $data['tgl_keluar'] ?></td>
                                        <td><?= $data['nama_poli'] ?></td>
                                        <td><?= $data['nama_barang'] ?></td>
                                        <td><?= $data['jumlah'] ?></td>
                                        <td class="button-group">
                                        <a class='btn btn-sm btn-success mb-md-0  mr-1' href='#'>Detail</a>
                                        <a class='btn btn-sm btn-warning mb-md-0  mr-1' href='#=<?= $data["id"]; ?>'>Update</a>
                                        <a class='btn btn-sm btn-danger mb-md-0  mr-1' href='#<?= $data["id_barang"]; ?>'>Delete</a>
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
  
