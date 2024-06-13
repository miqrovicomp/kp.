<?php
$role = get_user_role();
?>
<ul>
    <?php if ($role == 'admin'): ?>
        <li><a href="/admin/dashboard.php">Admin Dashboard</a></li>
    <?php elseif ($role == 'pimpinan'): ?>
        <li><a href="/pimpinan/dashboard.php">Pimpinan Dashboard</a></li>
    <?php elseif ($role == 'karyawan'): ?>
        <li><a href="/karyawan/dashboard.php">Karyawan Dashboard</a></li>
    <?php elseif ($role == 'teknisi'): ?>
        <li><a href="/teknisi/dashboard.php">Teknisi Dashboard</a></li>
    <?php endif; ?>
    <li><a href="/logout.php">Logout</a></li>
</ul>
