<?php
    include "../koneksi.php";
    session_start();
    if(!isset($_SESSION["is_login"])){
      header("location:../index.php");
    }else{
          if($_SESSION["role"]!="Admin"){
          header("location:../index.php");
          }
      }
    $query = "SELECT peminjaman.id_pinjam, peminjaman.id_users, peminjaman.id_buku, peminjaman.tgl_peminjaman,peminjaman.tanggal_pengembalian, buku.judul
                FROM peminjaman
                JOIN buku on peminjaman.id_buku=buku.id_buku
                WHERE status_up='dipinjam'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
?>

<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Daftar Peminjam</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        />
        <style>
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
        <div>
        <div class="sidebar p-4 bg-primary" id="sidebar">
            <h4 class="mb-5 text-white">Perpustakaan</h4>
            <li>
              <a class="text-white" href="index.php">
                <i class="bi bi-house mr-2"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a class="text-white" href="daftar_peminjam.php">
              <i class="bi bi-person-lines-fill"></i>
                Daftar Peminjam
              </a>
            </li>
            <li>
              <a class="text-white" href="Daftar_buku.php">
                <i class="bi bi-book"></i>
                Daftar Buku
              </a>
            </li>
            <li>
              <a class="text-white" href="Tambah.php">
              <i class="bi bi-bookmark-plus"></i>
                Tambah Buku
              </a>
            </li>

            <li>
              <a class="text-white" href="peminjaman_admin.php">
              <i class="bi bi-person-plus-fill"></i>
                Peminjaman Buku
              </a>
            </li>
            <li>
              <a class="text-white" href="Kembali.php">
                <i class="bi bi-person-dash-fill"></i>
                Pengembalian Buku
              </a>
            </li>
            <li>
              <a class="text-white" href="laporan.php">
                <i class="bi bi-journal-bookmark-fill"></i>
                Laporan
              </a>
            </li>
            <li>
              <a class="text-white" href="logout.php">
                <i class="bi bi-box-arrow-left"></i>
                Logout
              </a>
            </li>
          </div>
        </div>
        <!--bagian Body untuk card-->
        <div class="p-4 bg-primary text-white" id="main-content" style="height:30px; display:flex; align-items:center;" >
            <button class="btn btn-outline-light" id="button-toggle">
             <i class="bi bi-list"></i>
            </button>
        </div>
        
        <div class="p-4" id="main-content2">
          <div class="row">
            <?php
            $num_rows = mysqli_num_rows($result);

            if ($num_rows > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card">
                    <h5 class="card-header">Nota Peminjamn :<?php echo $row['id_pinjam']; ?> </h5>
                    <div class="card-body">
                        <h5 class="card-title">ID Member <?php echo $row['id_users'];?> </h5>
                        <p class="card-text">Judul buku yang dipinjam : <?php echo $row['judul']; ?></p>
                        <p class="card-text">Tanggal Peminjaman : <?php echo $row['tgl_peminjaman']; ?></p>
                        <p class="card-text">Tanggal Harus dikembalian : <?php echo $row['tanggal_pengembalian']; ?></p>
                        <p class="card-text">Denda : <?php 
                            $waktuSekarang = new DateTime();
                            $waktuSekarang->format('Y-m-d');
                            $pengembalian =new DateTime($row['tanggal_pengembalian']);
                            $selisih = $waktuSekarang ->diff($pengembalian)->days;
                            $batas= 0;
                            $denda_hari = 5000;
                                if($selisih > $batas) {
                                    $totalDenda = ($selisih - $batas) * $denda_hari;
                                    echo"$totalDenda";
                                } else {
                                    $totalDenda = 0;
                                    echo"$totalDenda";
                                }
                        ?></p>
                        <a  href="hapus_daftar_p.php?id=<?php echo $row['id_pinjam']; ?>" class="btn btn-primary">Hapus</a>
                    </div>
                </div>
            <?php
              }
            }else {
              echo '
              <div class="card text-center">
                <div class="card-header">
                  Soryy 
                </div>
                <div class="card-body">
                  <h5 class="card-title"><i class="bi bi-emoji-frown"></i></h5>
                  <p class="card-text">Belum ada Peminjam </p>
                </div>
            </div>';
          }
            ?>

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
         mysqli_close($conn);
        ?>
      </body>
</html>