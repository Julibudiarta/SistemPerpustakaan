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
  $tahun=date("Y");
//bulan 1
$sql = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=1 AND YEAR(tanggal_pengembalian)=$tahun";
$result = mysqli_query($conn, $sql);
//end bulan
//bulan 1
$sql2 = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=2 AND YEAR(tanggal_pengembalian)=$tahun";
$result2 = mysqli_query($conn, $sql2);
//end bulan
//bulan 1
$sql3 = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=3 AND YEAR(tanggal_pengembalian)=$tahun";
$result3 = mysqli_query($conn, $sql3);
//end bulan
//bulan 1
$sql4 = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=4 AND YEAR(tanggal_pengembalian)=$tahun";
$result4 = mysqli_query($conn, $sql4);
//end bulan
//bulan 1
$sql5 = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=5 AND YEAR(tanggal_pengembalian)=$tahun";
$result5 = mysqli_query($conn, $sql5);
//end bulan
//bulan 1
$sql6 = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=6 AND YEAR(tanggal_pengembalian)=$tahun";
$result6 = mysqli_query($conn, $sql6);
//end bulan
//bulan 1
$sql7 = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=7 AND YEAR(tanggal_pengembalian)=$tahun";
$result7 = mysqli_query($conn, $sql7);
//end bulan
//bulan 1
$sql8 = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=8 AND YEAR(tanggal_pengembalian)=$tahun";
$result8 = mysqli_query($conn, $sql8);
//end bulan
//bulan 1
$sql9 = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=9 AND YEAR(tanggal_pengembalian)=$tahun";
$result9 = mysqli_query($conn, $sql9);
//end bulan
$sql10 = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=10 AND YEAR(tanggal_pengembalian)=$tahun";
$result10 = mysqli_query($conn, $sql10);
//end bulan
$sql11 = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=11 AND YEAR(tanggal_pengembalian)=$tahun";
$result11 = mysqli_query($conn, $sql11);
//end bulan
$sql12 = "SELECT peminjaman.tanggal_pengembalian, peminjaman.denda, users.Username, buku.judul
         FROM peminjaman
         JOIN users ON peminjaman.id_users = users.id_users
         JOIN buku ON peminjaman.id_buku = buku.id_buku
         WHERE status_up='dikembalikan' AND MONTH(tanggal_pengembalian)=12 AND YEAR(tanggal_pengembalian)=$tahun";
$result12 = mysqli_query($conn, $sql12);
//end bulan

?>


<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Laporan</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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
          @media print {
            #main-content{
              display: none;
            }
            #main-content2 {
              display: block;
            }
            #tombol{
              display: none;
            }
            #button-toggle{
              display: none;
            }
            #sidebar2{
              display: none;
            }
            #nb{
              display:none;
            }
            .btn {
              display:none;
            }
          }
        </style>
      </head>
    
      <body>
        <div id="sidebar2">
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
        <!-- Tabel Laporan siap cetak-->
    <div class="p-4" id="main-content2">
        
            <h4 class="text-center">Laporan Peminjaman Buku</h4>
            <!--Bulan-->
            <div class="d-grid gap-2 mb-2">
            
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan Januari
            </button>
   
          <div id="Bulan" class="collapse">
            <h5 class="text"></h5>Bulan : Januari-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=1 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
            <!--END BULAN-->
          <!--Bulan-->
          <div class="d-grid gap-2 mb-2">
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan-2" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan February
            </button>
   
          <div id="Bulan-2" class="collapse">
            <h5 class="text"></h5>Bulan : February-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result2)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=2 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
                  
         <!--Bulan-->
         <div class="d-grid gap-2 mb-2">
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan-3" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan Maret
            </button>
   
          <div id="Bulan-3" class="collapse">
            <h5 class="text"></h5>Bulan : Maret-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result3)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=3 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
            <!--END BULAN-->

             <!--Bulan-->
             <div class="d-grid gap-2 mb-2">
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan-4" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan April
            </button>
   
          <div id="Bulan-4" class="collapse">
            <h5 class="text"></h5>Bulan : April-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result4)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=4 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
            <!--END BULAN-->

             <!--Bulan-->
             <div class="d-grid gap-2 mb-2">
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan-5" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan Mei
            </button>
   
          <div id="Bulan-5" class="collapse">
            <h5 class="text"></h5>Bulan : Mei-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result5)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=5 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
            <!--END BULAN-->

             <!--Bulan-->
             <div class="d-grid gap-2 mb-2">
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan-6" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan Juni
            </button>
   
          <div id="Bulan-6" class="collapse">
            <h5 class="text"></h5>Bulan : Juni-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result6)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=6 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
            <!--END BULAN-->

             <!--Bulan-->
             <div class="d-grid gap-2 mb-2">
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan-7" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan Juli
            </button>
   
          <div id="Bulan-7" class="collapse">
            <h5 class="text"></h5>Bulan : Juli-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result7)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=7 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
            <!--END BULAN-->

             <!--Bulan-->
             <div class="d-grid gap-2 mb-2">
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan-8" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan Agustus
            </button>
   
          <div id="Bulan-8" class="collapse">
            <h5 class="text"></h5>Bulan : Agustus-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result8)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=8 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
            <!--END BULAN-->

             <!--Bulan-->
             <div class="d-grid gap-2 mb-2">
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan-9" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan September
            </button>
   
          <div id="Bulan-9" class="collapse">
            <h5 class="text"></h5>Bulan : September-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result9)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=9 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
            <!--END BULAN-->

             <!--Bulan-->
             <div class="d-grid gap-2 mb-2">
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan-10" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan OKtober
            </button>
   
          <div id="Bulan-10" class="collapse">
            <h5 class="text"></h5>Bulan : Oktober-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result10)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=10 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
            <!--END BULAN-->

             <!--Bulan-->
             <div class="d-grid gap-2 mb-2">
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan-11" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan Nopember
            </button>
   
          <div id="Bulan-11" class="collapse">
            <h5 class="text"></h5>Bulan : Nopember-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result11)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=11 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
            <!--END BULAN-->

            <!--Bulan-->
            <div class="d-grid gap-2 mb-2">
            <button class="coll-12 btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Bulan-12" aria-expanded="false" aria-controls="collapseExample">
              Laporan Bulan Desember
            </button>
   
          <div id="Bulan-12" class="collapse">
            <h5 class="text"></h5>Bulan : Desember-<?php echo $tahun?></h5>
          <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Dikembalikan</th>
                <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while ($row = mysqli_fetch_assoc($result12)){
                ?>
                <tr>
                <th scope="row"><?php
                               echo $no;
                               $no++;
                                ?></th>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['judul'];?></td>
                <td><?php echo $row['tanggal_pengembalian'];?></td>
                <td>Rp.<?php 
                $denda=$row['denda'];
                $format_denda=number_format($denda, 0, ',', '.');
                echo $format_denda;?></td>
                </tr>
                <?php
                    }
                    ?>
                <th scope="row"></th>
                <td colspan="3" class="fw-bold text-center fs-6">Total</td>
                <td>Rp.<?php
                    $Sql_denda ="SELECT SUM(denda) AS total_denda FROM peminjaman WHERE MONTH(tanggal_pengembalian)=12 AND YEAR(tanggal_pengembalian)=$tahun";
                    $result_denda = mysqli_query($conn, $Sql_denda);
                    $denda_total = mysqli_fetch_assoc($result_denda);
                    $total_denda=$denda_total['total_denda'];
                    $format=number_format($total_denda, 0, ',', '.');
                    echo $format;
                ?></td>
                </tr>

            </tbody>
            </table>
            <div class="container d-grid gap-2 d-md-flex justify-content-md-end">
          <button onclick="cetak()" id="tombol" type="button" class="btn btn-success">Print</button>
        </div>
        </div>
        </div>
            <!--END BULAN-->

        <script>
    
          
          document.getElementById("button-toggle").addEventListener("click", () => {
    
            
            document.getElementById("sidebar").classList.toggle("active-sidebar");
    
            
            document.getElementById("main-content").classList.toggle("active-main-content");
            document.getElementById("main-content2").classList.toggle("active-main-content");
            document.getElementById("main-content3").classList.toggle("active-main-content");
          });
          function cetak() {
            window.print();
          }
        </script>
        <?php
         mysqli_close($conn);
        ?>
      </body>
</html>