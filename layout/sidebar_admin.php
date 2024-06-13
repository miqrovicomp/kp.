<style>
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    overflow-y: auto; /* Membuat scrollbar muncul jika konten terlalu panjang */
}

 
ul {
            list-style-type: none; /* Menghilangkan titik pada semua elemen list */
            padding: 0;
        }

        .submenu {
            display: none;
            padding-left: 20px;
        }

        .submenu li {
            margin: 5px 0;
        }
</style>
 
<div class="wrapper" >
         <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <?php
                include "../layout/judul_sidebar.php";
                ?>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="../admin/dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <ul>
                        <li>
                            <a class="nav-link" href="#" onclick="toggleSubmenu(event)">
                                <i class="nc-icon nc-paper-2"></i>
                                    <p>Barang</p>
                            </a>
                            <ul class="submenu">
                                 <li> 
                                <a class="nav-link" href="#" onclick="toggleSubmenu(event)">
                                    <i class="nc-icon nc-paper-2"></i>
                                    <p>Add Barang</p>
                                </a>
                                <ul class="submenu">
                                    <li class="nav-item active">
                                    <a class="nav-link" href="../barang/data_barang_masuk.php">
                                        <i class="nc-icon nc-paper-2"></i>
                                        <p>Barang Masuk</p>
                                        </a>
                                    <a class="nav-link" href="../barang/data_barang_keluar.php">
                                        <i class="nc-icon nc-paper-2"></i>
                                        <p>Barang Keluar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul>
                        <li>
                            <a class="nav-link" href="#" onclick="toggleSubmenu(event)">
                                <i class="nc-icon nc-paper-2"></i>
                                <p>Pengguna</p>
                            </a>
                            <ul class="submenu">
                                <li>
                                <li class="nav-item active">
                                <a class="nav-link" href="../pengguna/cek_data.php">
                                    <p>User</p>
                                    </a>
                                    
                                </li> 
                              <li> 
                                        <li class="nav-item active">
                                        <a class="nav-link" href="../poli/poli.php">
                                            <i class="nc-icon nc-paper-2"></i>
                                            <p>Poli</p>
                                        </a>   
                                </li>
                                <li> 
                                        <li class="nav-item active">
                                        <a class="nav-link" href="../data_teknisi/teknisi.php">
                                            <i class="nc-icon nc-paper-2"></i>
                                            <p>Teknisi</p>
                                        </a>   
                                     
                                </li> 
                                    <li> 
                                    
                                    
                                        <li class="nav-item active">
                                         
                                        <a class="nav-link" href="../data_karyawan/karyawan.php">
                                            <i class="nc-icon nc-paper-2"></i>
                                            <p>Karyawan</p>
                                        </a>   
                                     
                                    </li>    
                            </ul>
                        </li>
                    </ul>

                    <ul>
                        <li>
                            <a class="nav-link" href="#" onclick="toggleSubmenu(event)">
                                <i class="nc-icon nc-paper-2"></i>
                                <p>Pengaduan</p>
                            </a>
                                <ul class="submenu">
                                <li class="nav-item active">
                            <li>
                                <a class="nav-link" href="../perbaikan/pengaduan_perbaikan.php">
                                    <i class="nc-icon nc-paper-2"></i>
                                    <p>Services</p>
                                </a>
                            </li>       
                            </ul>
                        </li>
                    </ul>
                    <ul>
                    </ul>
                </ul>
            </div>
        </div>
             
        <script>
        function toggleSubmenu(event) {
            event.preventDefault(); // Prevent the default link behavior
            const submenu = event.target.closest('li').querySelector('.submenu');
            if (submenu.style.display === 'none' || submenu.style.display === '') {
                submenu.style.display = 'block';
            } else {
                submenu.style.display = 'none';
            }
        }
    </script>