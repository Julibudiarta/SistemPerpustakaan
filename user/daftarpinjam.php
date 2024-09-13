<?php
  include('../koneksi.php');
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
        <title>Daftar Peminjaman</title>

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
            #tabel{
              transition:0.4s;
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
        <!------------ And SideBar ------------>
        <!------------ Dashboard ------------>
        
        <div id="main-content2">
    <div class="container" id="tabel">
    <h2 align="center">Daftar Pinjaman</h2>
    <td>
        <!-- <a href='tambahdata.php?update=$dt[nopeg]'>
            <input type='button' value='Tambah Data'>
        </a> -->
    </td>

    <table border="1" align="center" width="100%" >
      <thead>
      <tr>
        <th>No</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Pengembalian</th>
        <th>Denda</th>
    </tr>
      </thead>
      <tbody>
      <?php
      $id_users=$_SESSION['id_user'];
      $sql = "SELECT peminjaman.id_pinjam, peminjaman.id_users, peminjaman.id_buku, peminjaman.tgl_peminjaman,peminjaman.tanggal_pengembalian, buku.judul
      FROM peminjaman
      JOIN buku on peminjaman.id_buku=buku.id_buku
      WHERE id_users=?";
      
      
      // Persiapan statement menggunakan prepared statement
      $stmt = mysqli_prepare($conn, $sql);
      
      // Bind parameter ke statement
      mysqli_stmt_bind_param($stmt, "i", $id_users);
      
      // Eksekusi statement
      mysqli_stmt_execute($stmt);
      
      // Ambil hasil query
      $result = mysqli_stmt_get_result($stmt);
      
            $no=1;
      while ($row = mysqli_fetch_assoc($result)) {
   ?>
        <tr>
          <th scope="row"><?php echo $no ;
                            $no++;
                            ?></th>
          <td><?php echo $row['judul'];?></td>
          <td><?php echo $row['tgl_peminjaman'];?></td>
          <td><?php echo $row['tanggal_pengembalian'];?></td>
          <td><?php 
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
              ?></td>
        </tr>
      <?php
      }
      ?>
      </tbody>


    
</table>
</div>
        <!------------ And Dashboard ------------>
        
        



        
        <script>
    
          // event will be executed when the toggle-button is clicked
          document.getElementById("button-toggle").addEventListener("click", () => {
    
            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");
    
            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
            document.getElementById("main-content2").classList.toggle("active-main-content");
            document.getElementById("main-content3").classList.toggle("active-main-content");
            document.getElementById("tabel").classList.toggle("active-main-content");
          });
    
        </script>
        <?php
        //  mysqli_close($conn);
        ?>
      </body>
</html>