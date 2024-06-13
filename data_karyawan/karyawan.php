<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/status_login.php';
include_once __DIR__ . '/../layout/top_admin.php';
include_once __DIR__ . '/../layout/popUp.php';

$result = mysqli_query($conn, "SELECT 
k.id_karyawan, 
k.nik, 
k.nama, 
k.jenis_kelamin, 
k.alamat, 
k.id_pengguna, 
p.username, 
p.password
FROM 
karyawan k
JOIN 
pengguna p
ON 
k.username = p.username");
?>

                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                <td class="button-group">
                                    <a class='btn btn-sm btn-Success mb-md-3 mr-10  ' href='../data_karyawan/add_karyawan.php'>Tambah Data</a>
                                </td>
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Data Karyawan</h4>
                                        </div>
                                        <div class="card-body">
                                        <table class="table table-hover table-striped w-100" id="table-1">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>username</th>
                                            <th>password</th>
                                            <th style="width: 150">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                                        <?php
                                        while ($data = mysqli_fetch_array($result)) :
                                        ?>
    
                                        <tr>
                                        <td><?= $data['id_karyawan'] ?></td>
                                        <td><?= $data['nik'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['jenis_kelamin'] ?></td> 
                                        <td><?= $data['alamat'] ?></td>
                                        <td><?= $data['username'] ?></td>
                                        <td><?= $data['password'] ?></td>
                                        <td class="button-group">
                                        <a class='btn btn-sm btn-danger mb-md-0  mr-1' href='delete.php?id_karyawan=<?= $data["id_karyawan"]; ?>'>Delete</a>
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