 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/login.css">
</head>
<style>
 
 body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f5f5f5; /* Warna latar belakang untuk kontras */
    }

    .kotak_login {
        width: 300px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .form_login {
        width: 91%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .tombol_login {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    .tombol_login:hover {
        background-color: #0056b3;
    }

    /* CSS untuk mobile */
    @media only screen and (max-width: 600px) {
        .kotak_login {
            width: 90%;
        }
    }

    /* CSS untuk tata letak mobile ukuran 1080x2400 */
    @media (max-width: 1080px) {
      .kotak_login {
        width: 80%; /* Sesuaikan lebar kotak login */
        margin: 0 auto; /* Pusatkan kotak login */
      }
      
      .form_login {
        width: 100%; /* Sesuaikan lebar input form */
        margin-bottom: 10px; /* Berikan jarak antar input */
      }

      .tombol_login {
        width: 100%; /* Sesuaikan lebar tombol login */
      }
    }
   
</style> 
<body>
 

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          <script>
            <?php
            if(isset($_GET['gagal']) && $_GET['gagal'] == "gagal") {
            ?>
              Swal.fire({
              title: "Cek Kembali",
              text: "Username dan Password Anda",
              icon: "question",
              });
            <?php
             
            }
            ?>
      </script>


 
	<div class="kotak_login">
		  <h2><p class="tulisan_login ">SI MENRIS</p></h2> 
		<form action="../kp/cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username " required="required" autocomplete="off">
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password" required="required" autocomplete="off">
			<input type="submit" class="tombol_login" value="LOGIN">

			<br/>
			<br/>
		</form>
	</div>
 

</body>
</html>