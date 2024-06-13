 
<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/status_login.php';
include_once __DIR__ . '/../layout/top_admin.php';
 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $hak_akses = $_POST['hak_akses'];

    $sql = "INSERT INTO pengguna (username, password, hak_akses) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $hak_akses);
    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
 
?>
           

<div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                    <div class="card">
                                        <div class="row">
                                        <div class="col-sm-12">
                                          <div class="card">
                                          <b><div class="card-header bg-light text-black ">
                                          Add User
                                            </div> </b>
                                            <div class="card-body">                                
                                              <div class="container">
                                              <form method="POST">
                                                    Username: <input type="text" name="username" class="form-control" required>
                                                    Password: <input type="password" name="password" class="form-control" required>
                                                    Role:
                                                    <select name="hak_akses" class="form-control" required>
                                                        <option value="admin">Admin</option>
                                                        <option value="pinpinan">Pinpinan</option>
                                                        <option value="karyawan">Karyawan</option>
                                                        <option value="teknisi">Teknisi</option>
                                                    </select>
                                                    <br>
                                                    <button type="submit" name="submit"  class="btn btn-success">Register</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
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
  
