<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_karyawan.php';
include_once __DIR__ . '/../layout/colom-dataCard.php';



// Ambil data dari form pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query SQL dengan kriteria pencarian
$sql = "SELECT p.nama_poli, b.id_barang, b.nama_barang 
        FROM barang b 
        JOIN poli p ON b.id_poli = p.id_poli";

// Tambahkan kriteria pencarian jika ada
if ($search) {
    $sql .= " WHERE p.nama_poli LIKE ?";
}

$stmt = $conn->prepare($sql);

if ($search) {
    $search_param = "%" . $search . "%";
    $stmt->bind_param("s", $search_param);
}

$stmt->execute();
$result = $stmt->get_result();
?>

                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">CEK  ID BARANG ANDA..?</h4>
                                            <form method="GET" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Cari Nama Poli" value="<?= htmlspecialchars($search) ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                                        </div>
                                        <div class="card-body">
                                        <table class="table table-hover table-striped w-100" id="table-1">
                                        <thead>
                                            <tr>
                                            <th>Nama Poli</th>    
                                            <th>id Barang</th>
                                            <th>Nama Barang</th>
                                            
                                            <th style="width: 150">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                                        <?php
                                        while ($data = mysqli_fetch_array($result)) :
                                        ?>
    
                                        <tr>
                                        <td><?= $data['nama_poli'] ?></td>  
                                        <td><?= $data['id_barang'] ?></td>
                                        <td><?= $data['nama_barang'] ?></td>
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