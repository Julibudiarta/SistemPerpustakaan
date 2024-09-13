<?php
include '../koneksi.php';

session_start();
    if(!isset($_SESSION["is_login"])){
      header("location:../index.php");
    }else{
          if($_SESSION["role"]!="Admin"){
          header("location:../index.php");
          }
      }
// Memeriksa apakah form telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $judul = $_POST["judul"];
    $jenis = $_POST["jenis"];
    $pengarang = $_POST["penulis"];
    $tahun = $_POST["tahun"];
    $stok = $_POST["stok"];
    
    
    // Mengambil informasi file gambar
    $gambar = $_FILES["gambar"]["name"];
    $gambar_tmp = $_FILES["gambar"]["tmp_name"];
    $gambar_type = $_FILES["gambar"]["type"];
    $gambar_size = $_FILES["gambar"]["size"];
    
    // Menyimpan gambar ke dalam folder
    $gambar_folder = "../coverbuku/";
    $gambar_path = $gambar_folder . $gambar;
    move_uploaded_file($gambar_tmp, $gambar_path);

    //otomatis id
    if ($jenis == "pelajaran") {
        // Mengambil ID terakhir untuk jenis pelajaran
        $sql_last_id = "SELECT id_buku FROM buku WHERE jenis = 'pelajaran' ORDER BY id_buku DESC LIMIT 1";
        $result = $conn->query($sql_last_id);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $last_id = $row["id_buku"];
            $id_buku = ($last_id + 1);
        } else {
            $id_buku = "220"."0";
        }
    } elseif ($jenis == "cerita") {
        // Mengambil ID terakhir untuk jenis cerita
        $sql_last_id = "SELECT id_buku FROM buku WHERE jenis = 'cerita' ORDER BY id_buku DESC LIMIT 1";
        $result = $conn->query($sql_last_id);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $last_id = $row["id_buku"];
            $id_buku = ($last_id + 1);
        } else {
            $id_buku = "210"."0";
        }
    }elseif ($jenis =="kamus") {
      // Mengambil ID terakhir untuk jenis kamus
      $sql_last_id = "SELECT id_buku FROM buku WHERE jenis = 'kamus' ORDER BY id_buku DESC LIMIT 1";
      $result = $conn->query($sql_last_id);
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $last_id = $row["id_buku"];
          $id_buku = ($last_id + 1);
      } else {
          $id_buku = "230"."0";
      }
    }elseif ($jenis =="novel") {
      // Mengambil ID terakhir untuk jenis novel
      $sql_last_id = "SELECT id_buku FROM buku WHERE jenis = 'novel' ORDER BY id_buku DESC LIMIT 1";
      $result = $conn->query($sql_last_id);
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $last_id = $row["id_buku"];
          $id_buku = ($last_id + 1);
      } else {
          $id_buku = "240"."0";
      }
    }else {
        // Jenis buku tidak valid
        echo "Jenis buku tidak valid";
        exit;
    }
    
    // Menyimpan data buku beserta gambar ke database
    $sql = "INSERT INTO buku (id_buku, judul, jenis, tahun, penulis, stok, gambar) VALUES ('$id_buku', '$judul', '$jenis', '$tahun', '$pengarang', $stok, '$gambar_path')";

    if ($conn->query($sql) === TRUE) {

      $pesan="Data berhasil ditambahkan";
      echo "<script> alert('$pesan');</script>";
      
    } else {
        echo "Error: " . $sql . "<br>" . $conn;
    }
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tambah Buku</title>
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

        <div class="p-4 bg-primary text-white" id="main-content" style="height:30px; display:flex; align-items:center;">
            <button class="btn btn-outline-light" id="button-toggle">
             <i class="bi bi-list"></i>
            </button>
        </div>

        <!--bagian Body untuk from-->
        <br>
<div class="p-4 bg-body-tertiary" id="main-content2">
<div class="p-4">
    <h3 class="text-center">From Inputan Buku</h3>
</div>
<form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <div class="col-md-6">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan judul buku">
    </div>

    <div class="col-md-6">
        <label for="jenis" class="form-label">jenis buku</label>
        <select id="jenis" class="form-select" name="jenis">
        <option selected>Pilih jenis buku</option>
        <option values="pelajaran">pelajaran</option>
        <option values="cerita">cerita</option>
        <option values="kamus">kamus</option>
        <option values="novel">novel</option>
        </select>
    </div>

    <div class="col-12">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" class="form-control" id="stok" placeholder="Masukan stok buku" name="stok">
    </div>
    <div class="col-md-6">
        <label for="inputtahun" class="form-label">Terbit</label>
        <input type="date" class="form-control" id="inputtahun" name="tahun">
    </div>

    <div class="col-md-3">
        <label for="pengarang" class="form-label">Penulis</label>
        <input type="text" class="form-control" id="pengarang" placeholder="Masukan Nama Pengarang" name="penulis">
    </div>

    <div class="col-md-2">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar">
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

