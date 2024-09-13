<?php
    include "../koneksi.php";
    session_start();
    if(!isset($_SESSION["is_login"])){
      header("location:../index.php");
    }else{
          if($_SESSION["role"]!="User"){
          header("location:../index.php");
          }
      }
?>

<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Daftar Buku</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        />
        <style>
            body {
                background: #d6e0fb;
            }
            li {
                list-style: none;
                margin: 20px 0 20px 0;
            }
        
            a {
                text-decoration: none;
            }
        
            .sidebar {
                width: 250px;
                height: 100vh;
                position: fixed;
                margin-left: -300px;
                transition: 0.4s;
            }
        
            .active-main-content {
                margin-left: 250px;
            }
        
            .active-sidebar {
                margin-left: 0;
            }
        
            #main-content {
                transition: 0.4s;
            }
            #main-content2 {
                transition: 0.4s;
            }
            #main-content3 {
                transition: 0.4s;
            }
        </style>
      </head>
    
      <body>
        <!------------ SideBar ------------>
        <div>
          <div class="sidebar p-4 bg-primary" id="sidebar">
            <h4 class="mb-2 text-white">Perpustakaan</h4>
            <hr class="my-4">
            <li>
              <a class="text-white" href="user.php">
                <i class="bi bi-house mr-2"></i>
              <span> Dashboard</span>
              </a>
            </li>
            <li>
              <a class="text-white" href="daftarpinjam.php">
              <i class="bi bi-bag-plus-fill"></i>
                Daftar Pinjaman
              </a>
            </li>
            <li>
              <a class="text-white" href="daftarbuku.php">
              <i class="bi bi-book-half"></i>
                <span>Daftar Buku</span>
              </a>
            </li>
            <li>
              <a class="text-white" href="profil.php">
              <i class="bi bi-person-circle"></i>
                <span>Profil</span>
              </a>
            </li>
              <a class="text-white" href="logout.php">
              <i class="bi bi-box-arrow-left"></i>
                <span>LogOut</span>
              </a>
            </li>
          </div>
        </div>
        <!--bagian Body untuk card-->
        <div class="p-4 bg-primary text-white" id="main-content" style="height:30px; display:flex; align-items:center;" >
            <button class="btn btn-outline-light" id="button-toggle">
             <i class="bi bi-list"></i>
            </button>
            <h4 class="mb-9 text-white"><span>Perpustakaan</span></h4>
        </div>
        
        <div id="main-content2">
        <!--buku jenis pelajaran-->
        <div class="p-5">
          <div class="badge bg-primary text-wrap mb-4" style="width: 12rem;">
            <h6 >Buku Jenis Pelajaran</h6>
          </div>
        
          <div class="row">
              <?php
              $query_pl = "SELECT * FROM buku
                            WHERE jenis = 'pelajaran'
                            ORDER BY judul ASC";
              $result = mysqli_query($conn, $query_pl);
              $num_rows = mysqli_num_rows($result);

              if ($num_rows > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <div class="col-sm-12 col-md-6 col-lg-3">
                          <div class="card custom-card" style="margin-bottom:10px;">
                              <img src="<?php echo $row['gambar']; ?>" class="card-img-top img-thumbnail" alt="<?php echo $row['gambar']; ?>">
                              <div class="card-body">
                                  <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                                  <p class="card-text">Pengarang : <?php echo $row['penulis']; ?></p>
                                  <p class="card-text">Terbit : <?php echo $row['tahun']; ?></p>
                                  <p class="card-text">Stok : <?php echo $row['stok']; ?></p>
                              </div>
                          </div>
                      </div>
                      <?php
                  }
              } else {
                echo '
                <div class="card text-center">
                  <div class="card-header">
                    Soryy 
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-emoji-frown"></i></h5>
                    <p class="card-text">Belum ada buku dalam jenis ini </p>
                  </div>
              </div>';
            }
              
              ?>
            </div>

        </div>

          <!--buku jenis cerita-->
          <div class="p-5">
          <div class="badge bg-primary text-wrap mb-4" style="width: 12rem;">
            <h6 >Buku Jenis Cerita</h6>
          </div>
        
          <div class="row">
          <?php
              $query_pl = "SELECT * FROM buku
                            WHERE jenis = 'cerita'
                            ORDER BY judul ASC";
              $result = mysqli_query($conn, $query_pl);
              $num_rows = mysqli_num_rows($result);

              if ($num_rows > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <div class="col-sm-12 col-md-6 col-lg-3">
                          <div class="card custom-card" style="margin-bottom:10px;">
                              <img src="<?php echo $row['gambar']; ?>" class="card-img-top img-thumbnail" alt="<?php echo $row['gambar']; ?>">
                              <div class="card-body">
                                  <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                                  <p class="card-text">Pengarang : <?php echo $row['penulis']; ?></p>
                                  <p class="card-text">Terbit : <?php echo $row['tahun']; ?></p>
                                  <p class="card-text">Stok : <?php echo $row['stok']; ?></p>
                                  
                              </div>
                          </div>
                      </div>
                      <?php
                  }
              } else {
                  echo '
                  <div class="card text-center">
                    <div class="card-header">
                      Soryy 
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><i class="bi bi-emoji-frown"></i></h5>
                      <p class="card-text">Belum ada buku dalam jenis ini </p>
                    </div>
                </div>';
              }
              ?>

            </div>
        </div>
        <!-- buku jenis kamus -->
        <div class="p-5">
          <div class="badge bg-primary text-wrap mb-4" style="width: 12rem;">
            <h6 >Buku Jenis Kamus</h6>
          </div>
        
          <div class="row">
          <?php
              $query_pl = "SELECT * FROM buku
                            WHERE jenis = 'kamus'
                            ORDER BY judul ASC";
              $result = mysqli_query($conn, $query_pl);
              $num_rows = mysqli_num_rows($result);

              if ($num_rows > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <div class="col-sm-12 col-md-6 col-lg-3">
                          <div class="card custom-card" style="margin-bottom:10px;">
                              <img src="<?php echo $row['gambar']; ?>" class="card-img-top img-thumbnail" alt="<?php echo $row['gambar']; ?>">
                              <div class="card-body">
                                  <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                                  <p class="card-text">Pengarang : <?php echo $row['penulis']; ?></p>
                                  <p class="card-text">Terbit : <?php echo $row['tahun']; ?></p>
                                  <p class="card-text">Stok : <?php echo $row['stok']; ?></p>
                                  
                              </div>
                          </div>
                      </div>
                      <?php
                  }
              } else {
                echo '
                <div class="card text-center">
                  <div class="card-header">
                    Soryy 
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-emoji-frown"></i></h5>
                    <p class="card-text">Belum ada buku dalam jenis ini </p>
                  </div>
                </div>';
              }
              ?>

            </div>
        </div>
        <!--buku jenis novel-->
        <div class="p-5">
          <div class="badge bg-primary text-wrap mb-4" style="width: 12rem;">
            <h6 >Buku Novel</h6>
          </div>
        
          <div class="row">
          <?php
              $query_pl = "SELECT * FROM buku
                            WHERE jenis = 'novel'
                            ORDER BY judul ASC";
              $result = mysqli_query($conn, $query_pl);
              $num_rows = mysqli_num_rows($result);

              if ($num_rows > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <div class="col-sm-12 col-md-6 col-lg-3">
                          <div class="card custom-card" style="margin-bottom:10px;">
                              <img src="<?php echo $row['gambar']; ?>" class="card-img-top img-thumbnail" alt="<?php echo $row['gambar']; ?>">
                              <div class="card-body">
                                  <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                                  <p class="card-text">Pengarang : <?php echo $row['penulis']; ?></p>
                                  <p class="card-text">Terbit : <?php echo $row['tahun']; ?></p>
                                  <p class="card-text">Stok : <?php echo $row['stok']; ?></p>
                                 
                              </div>
                          </div>
                      </div>
                      <?php
                  }
              } else {
                echo '
                <div class="card text-center">
                  <div class="card-header">
                    Soryy 
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-emoji-frown"></i></h5>
                    <p class="card-text">Belum ada buku dalam jenis ini </p>
                  </div>
              </div>';
              }
              ?>

            </div>
        </div>
      </div>

        
        



        
        <script>
    
          // event will be executed when the toggle-button is clicked
          document.getElementById("button-toggle").addEventListener("click", () => {
    
            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");
    
            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
            document.getElementById("main-content2").classList.toggle("active-main-content");
            document.getElementById("main-content3").classList.toggle("active-main-content");
          });
    
        </script>
        <?php
        //  mysqli_close($conn);
        ?>
      </body>
</html>