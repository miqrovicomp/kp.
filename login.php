 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/login.css">
</head>
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