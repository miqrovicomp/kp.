<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          <script>
           <?php
                if (isset($_GET['Berhasil']) && $_GET['Berhasil'] == "Berhasil") {
                ?>
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: "Berhasil di Simpan",
                        showConfirmButton: false,
                        timer: 1500
                    });
                <?php
                } elseif (isset($_GET['loginSukses']) && $_GET['loginSukses'] == "loginSukses") {
                ?>
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: "Login Sukses",
                        showConfirmButton: false,
                        timer: 1500
                    });
                <?php
                } elseif (isset($_GET['karyawan']) && $_GET['karyawan'] == "karyawan") {
                ?>
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: "Data Karyawan Tidak di Temukan",
                        showConfirmButton: false,
                        timer: 1500
                    });
                <?php
                } elseif (isset($_GET['teknisi']) && $_GET['teknisi'] == "teknisi") {
                ?>
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: "Berhasil Update",
                        showConfirmButton: false,
                        timer: 1500
                    });
                <?php
                } elseif (isset($_GET['delete']) && $_GET['delete'] == "delete") {
                ?>
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: "Berhasil Delete",
                        showConfirmButton: false,
                        timer: 1500
                    });
                <?php
                } elseif (isset($_GET['loginGagal']) && $_GET['loginGagal'] == "loginGagal") {
                ?>
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: "Data Berhasil Dihapus",
                        showConfirmButton: false,
                        timer: 1500
                    });
                <?php
                }
?>

      </script>