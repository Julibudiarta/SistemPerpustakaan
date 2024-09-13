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

      $id=$_GET['id'];
      $sql_value="SELECT * FROM buku WHERE id_buku=$id";
      $result_value=mysqli_query($conn,$sql_value);
      $value=mysqli_fetch_array($result_value);
// Memeriksa apakah form telah dikirim
if (isset($_POST['submit'])) {
    // Mengambil data dari form
    $judul = $_POST["judul"];
    $jenis = $_POST["jenis"];
    $pengarang = $_POST["penulis"];
    $tahun = $_POST["tahun"];
    $stok = $_POST["stok"];
    
    
    // melihat gambar di isi atau tidak
    if(empty($_FILES['gambar']['name'])){
        $gambar_path=$value['gambar'];
    }else{
    $gambar = $_FILES["gambar"]["name"];
    $gambar_tmp = $_FILES["gambar"]["tmp_name"];
    $gambar_type = $_FILES["gambar"]["type"];
    $gambar_size = $_FILES["gambar"]["size"];
    
    // Menyimpan gambar ke dalam folder
    $gambar_folder = "../coverbuku/";
    $gambar_path = $gambar_folder . $gambar;
    move_uploaded_file($gambar_tmp, $gambar_path);
    }
    // Menyimpan data buku beserta gambar ke database
    $sql = "UPDATE buku SET judul='$judul', jenis='$jenis', penulis='$pengarang', tahun='$tahun', stok=$stok, gambar='$gambar_path'
            WHERE id_buku=$id";

    if ($conn->query($sql) === TRUE) {

      $pesan="Data berhasil di Update";
      echo "<script> alert('$pesan');</script>";
      header("location:index.php");
      
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
        <title>Update Buku</title>
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
    <h3 class="text-center">From Update Buku</h3>
</div>
<form class="row g-3" method="post" enctype="multipart/form-data" action="">
    <div class="col-md-6">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan judul buku" value="<?php echo $value['judul']; ?>">
    </div>

    <div class="col-md-6">
        <label for="jenis" class="form-label">jenis buku</label>
        <select id="jenis" class="form-select" name="jenis">
        <option selected>Pilih jenis buku</option>
        <option values="pelajaran"<?php echo ($value['jenis']=="pelajaran")?"selected" : ""; ?>>pelajaran</option>
        <option values="cerita"<?php echo ($value['jenis']=="cerita")?"selected" : ""; ?>>cerita</option>
        <option values="kamus"<?php echo ($value['jenis']=="kamus")?"selected" : ""; ?>>kamus</option>
        <option values="novel"<?php echo ($value['jenis']=="novel")?"selected" : ""; ?>>novel</option>
        </select>
    </div>

    <div class="col-12">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" class="form-control" id="stok" placeholder="Masukan stok buku" name="stok" value="<?php echo $value['stok']; ?>">
    </div>
    <div class="col-md-6">
        <label for="inputtahun" class="form-label">Terbit</label>
        <input type="date" class="form-control" id="inputtahun" name="tahun" value="<?php echo isset($value['tahun']) ? $value['tahun'] : ''; ?>">
    </div>

    <div class="col-md-3">
        <label for="pengarang" class="form-label">Penulis</label>
        <input type="text" class="form-control" id="pengarang" placeholder="Masukan Nama Pengarang" name="penulis" value="<?php echo $value['penulis']; ?>">
    </div>

    <div class="col-md-2">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary" value="Tambah Buku" name="submit">Submit</button>  <a href="index.php" class="btn btn-success">cencel</a>
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

