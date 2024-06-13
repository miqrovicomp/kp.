
<?php
include_once __DIR__ . '/../layout/status_login.php';

?>

<style>
 .navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000; /* Pastikan navbar berada di atas elemen lain */
    height: 60px; /* Atur tinggi navbar */
    width: 84%; /* Atur lebar navbar */
    left: 18%;
    right: 19%;
}

body {
    font-family:  sans-serif;
    
}

.marquee {
    width: 30%;
    overflow: hidden;
    position: relative;
    background: #9368E9;
    padding: 10px 50;
    white-space: nowrap;
    
    
}

.marquee-text {
    display: inline-block;
    padding-left: 80%;
    color: white;
    animation: marquee 10s linear infinite;
    
}

@keyframes marquee {
    0% {
        transform: translateX(0%);
    }
    100% {
        transform: translateX(-100%);
    }
}


 
 </style>
 <!-- Navbar -->

 </style>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          <script>
            <?php
            if(isset($_GET['sukses']) && $_GET['sukses'] == "sukses") {
            ?>
              Swal.fire({
              position: "top-center",
              icon: "success",
              title: "Your work has been saved",
              showConfirmButton: false,
              timer: 1500
          
              });
            <?php
            } elseif(isset($_GET['gagal']) && $_GET['gagal'] == "gagal") {
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
 
 <nav class="navbar navbar-expand-lg  " color-on-scroll="500">
                <div class="container-fluid">
                    <div class="marquee">
                        <span class="marquee-text">PUSKESMAS KAMONING</span>
                     </div>
                     <div class="md-6">
                     <?php   echo htmlspecialchars($_SESSION ['username']);   ?>
                    </div>   
                     
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php">
                                
                                  <img alt="image"  src="../assets/img/avatar-1.png" style="height: 38px;" class="rounded-circle mr-1">
                                  
                                  <div class="d-sm-none d-lg-inline-block">Logout</div>
                                  
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
              
            <!-- End Navbar -->