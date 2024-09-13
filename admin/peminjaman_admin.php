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
      
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_buku = $_POST["id_buku"];
        $id_users = $_POST["id_users"];
        $tgl_peminjaman = $_POST["tanggal_pinjam"];
        $tgl_pengembalian = $_POST["tanggal_pengembalian"];
        $status="dipinjam";
    
        

        ## id otomatis
        $sql_last_id = "SELECT id_pinjam FROM peminjaman ORDER BY id_pinjam DESC LIMIT 1";
        $result = $conn->query($sql_last_id);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $last_id = $row["id_pinjam"];
                $id_peminjam = ($last_id + 1);
      }else {
        $id_peminjam = "880"."1";
    };
    $sql = "INSERT INTO peminjaman(id_pinjam, id_users, id_buku, tgl_peminjaman, tanggal_pengembalian,status_up) VALUES ('$id_peminjam', '$id_users', '$id_buku', '$tgl_peminjaman', '$tgl_pengembalian','$status')";
    if ($conn->query($sql) === TRUE) {
      ## Pengurangan stok buku ketika di pinjam
      $sql_buku = "SELECT stok FROM buku WHERE id_buku = $id_buku";
      $result_buku = $conn->query($sql_buku);
      
      if ($result_buku->num_rows > 0) {
        $stok = $result_buku->fetch_assoc();
        $stok_ls = $stok["stok"];
        $stok_up = ($stok_ls - 1);
        $sql_up_stok = "UPDATE buku SET stok = $stok_up WHERE id_buku = $id_buku";
        $rs = $conn->query($sql_up_stok);
      }else {
        $pesan="No anggota tidak ditemukan pastikan daftar dulu";
          echo "<script> alert('$pesan');</script>";
      }
      $pesan="Data Berhasil ditambahkan";
        echo "<script> alert('$pesan');</script>";
  } else {
    $pesan="No anggota tidak ditemukan pastikan daftar dulu";
      echo "<script> alert('$pesan');</script>";
  }
    }

?>

  <!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>Tambah Peminjam</title>
          <!-- bootstrap 5.3 css -->
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

          <div class="p-4 bg-primary text-white" id="main-content" style="height:30px; display:flex; align-items:center;" sytle="display:block;">
              <button class="btn btn-outline-light" id="button-toggle">
              <i class="bi bi-list"></i>
              </button>
          </div>

          <!--bagian Body untuk from-->
          <br>
  <div class="p-4 bg-body-tertiary" id="main-content2">
      <div class="p-4">
          <h3 class="text-center">From Peminjaman buku</h3>
      </div>
      <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

         
          <!--option nama buku-->
          <div class="col-md-6">
            <label for="id_buku" class="form-label">jenis buku</label>
            <select id="id_buku" class="form-select" name="id_buku">
              <option selected>Pilih judul buku</option>
              <?php
              $option_value =mysqli_query($conn,"SELECT * FROM buku");
              while ($row = mysqli_fetch_assoc($option_value)) {
              ?>
              <option class="bg-light" value="<?php echo $row['id_buku'];?>"> <?php echo $row['judul'];?> </option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="col-6">
              <label for="id_users" class="form-label">No Anggota</label>
              <input type="text" class="form-control" id="id_users" placeholder="Masukan No anggota peminjam" name="id_users">
          </div>
          <div class="col-md-12">
              <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
              <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_pinjam">
          </div>
          <div class="col-md-12">
              <label for="tanggal_peminjaman" class="form-label">Tanggal Pengembalian</label>
              <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_pengembalian">
          </div>
          <div class="col-12">
              <button type="submit" class="btn btn-primary" value="Tambah Buku">Submit</button>
          </div>
          <br>
      </form>
  </div>

          <script>
      
            // event will be executed when the toggle-button is clicked
            document.getElementById("button-toggle").addEventListener("click", () => {
      
              // when the button-toggle is clicked, it will add/remove the active-sidebar class
              document.getElementById("sidebar").classList.toggle("active-sidebar");
      
              // when the button-toggle is clicked, it will add/remove the active-main-content class
              document.getElementById("main-content").classList.toggle("active-main-content");
              document.getElementById("main-content2").classList.toggle("active-main-content");
            });
      
          </script>
        </body>
  </html>