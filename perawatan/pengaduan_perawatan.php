<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_admin.php';

$result = mysqli_query($conn, "SELECT 

p.`id_pengaduan_perawatan`,  
p.`tgl_pengaduan_perawatan`, 
p.`id_karyawan`, 
k.`nama`, 
d.`id_barang`, -- Menambahkan kolom id_barang
d.`keterangan`, 
d.`jumlah` 
FROM 
`pengaduan_perawatan` p
JOIN 
`pengaduan_perawatan_detail` d ON p.`id_pengaduan_perawatan` = d.`id_pengaduan_perawatan`
JOIN
`karyawan` k ON p.`id_karyawan` = k.`id_karyawan`;


");
?>

                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Pengaduan Perawatan Maintencae</h4>
                                        </div>
                                        <div class="card-body">
                                        <table class="table table-hover table-striped w-100" id="table-1">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Tgl Perawatan</th>
                                            <th>Nama</th>
                                            <th>id Barang</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>
                                             
                                            <th style="width: 150">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                                        <?php
                                        while ($data = mysqli_fetch_array($result)) :
                                        ?>
    
                                        <tr>
                                        <td><?= $data['id_pengaduan_perawatan'] ?></td> 
                                        <td><?= $data['tgl_pengaduan_perawatan'] ?></td>
                                        <td><?= $data['nama'] ?></td> 
                                        <td><?= $data['id_barang'] ?></td> 
                                        <td><?= $data['keterangan'] ?></td> 
                                        <td><?= $data['jumlah'] ?></td> 
                                        <td class="button-group">
                                        <a class='btn btn-sm btn-success mb-md-0  mr-1' href='edit.php?id=<?= $data["id"]; ?>'>Update</a>
                                        <a class='btn btn-sm btn-danger mb-md-0  mr-1' href='delete.php?id_pengaduan_perawatan=<?= $data["id_pengaduan_perawatan"]; ?>'>Delete</a>
                                        </td> 
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