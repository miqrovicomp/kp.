<?php
include_once 'includes/functions.php';

 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (login($username, $password)) {
        $hak_akses = get_user_hak_akses();
        $_SESSION['username'] = $username;
        switch ($hak_akses) {
            case 'admin':
                header("Location: ../kp/admin/dashboard.php?loginSukses=loginSukses");
                break;
            case 'pinpinan':
                header("Location: ../kp/pinpinan/dashboard.php?loginSukses=loginSukses");
                break;
            case 'karyawan':
                header("Location: ../kp/karyawan/dashboard.php?loginSukses=loginSukses");
                break;
            case 'teknisi':
                header("Location: ../kp/teknisi/dashboard.php?loginSukses=loginSukses");
                break;
        }
        exit;
    } else {
        header("location: login.php?gagal=gagal");
 
    }

} 
?>
 