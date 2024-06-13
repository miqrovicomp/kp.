<style>
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    overflow-y: auto; /* Membuat scrollbar muncul jika konten terlalu panjang */
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
                        <a class="nav-link" href="../teknisi/dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../teknisi/pengaduan_perbaikan.php">
                          <i class="nc-icon nc-paper-2"></i>
                            <p>Pengaduan Services</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
             