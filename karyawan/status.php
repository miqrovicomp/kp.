<?php
include_once __DIR__ . '/../layout/status_login.php';
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_karyawan.php';
include_once __DIR__ . '/../layout/colom-dataCard.php';
include_once __DIR__ . '/../layout/popUp.php';


$result = mysqli_query($conn, "SELECT pp.id_pengaduan_perbaikan, 
pp.tgl_pengaduan_perbaikan, 
k.nama AS nama_karyawan, 
b.nama_barang, 
ppd.keterangan, 
ppd.jumlah, 
ppd.tgl_pengerjaan, 
ppd.status 
FROM pengaduan_perbaikan pp 
INNER JOIN karyawan k ON pp.id_karyawan = k.id_karyawan 
INNER JOIN pengaduan_perbaikan_detail ppd ON pp.id_pengaduan_perbaikan = ppd.id_pengaduan_perbaikan 
INNER JOIN barang b ON ppd.id_barang = b.id_barang;
");
?>

                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Status Services</h4>
                                        </div>
 
                                        <div class="card-body">
                                         
                                        <table class="table table-hover table-striped w-100" id="table-1">
                                        <thead>
                                            <tr>
                                            <th>Tgl Pengaduan Perbaikan</th>
                                            <th>Nama</th>
                                            <th>Nama Barang</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>
                                            <th>Tgl dikerjakan</th>
                                            <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                                        <?php
                                        while ($data = mysqli_fetch_array($result)) :
                                        ?>
    
                                        <tr>
                                        <td><?= $data['tgl_pengaduan_perbaikan'] ?></td>
                                        <td><?= $data['nama_karyawan'] ?></td>
                                        <td><?= $data['nama_barang'] ?></td>
                                        <td><?= $data['keterangan'] ?></td>
                                        <td><?= $data['jumlah'] ?></td>
                                        <td><?= $data['tgl_pengerjaan'] ?></td>
                                        <td style="background-color: <?php
                                        if ($data['status'] === 'Selesai') {
                                            echo '	#00FF00';
                                        } elseif ($data['status'] === 'Pending') {
                                            echo '#FFA500';
                                        } elseif ($data['status'] === 'Proses') {
                                            echo '#FF4500';
                                        } else {
                                            echo 'inherit'; // Untuk status lain, biarkan warna latar belakang mengikuti style yang ada
                                        }
                                         ?>">
                                        <?php echo $data['status']; ?>
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