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
    $id = $_GET['id'];
    $sql="SELECT * FROM peminjaman WHERE id_pinjam = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id_buku=$row['id_buku'];
    
// Mendapatkan waktu sekarang
    $waktu_sekarang = date('Y-m-d H:i:s');
    // denda
    $waktuSekarang = new DateTime();
    $waktuSekarang->format('Y-m-d');
    $pengembalian =new DateTime($row['tanggal_pengembalian']);
    $selisih = $waktuSekarang ->diff($pengembalian)->days;
    $batas= 0;
    $denda_hari = 5000;
        if($selisih > $batas) {
            $totalDenda = ($selisih - $batas) * $denda_hari;
        } else {
            $totalDenda = 0;
            
        }
        $query ="UPDATE peminjaman SET status_up='dikembalikan',denda=$totalDenda WHERE id_pinjam=$id";
    if (mysqli_query($conn, $query)) {
        //update stok
        $sql_buku = "SELECT stok FROM buku WHERE id_buku = $id_buku";
        $result_buku = $conn->query($sql_buku);
        if ($result_buku->num_rows > 0) {
          $stok = $result_buku->fetch_assoc();
          $stok_ls = $stok["stok"];
          $stok_up = ($stok_ls + 1);
          $sql_up_stok = "UPDATE buku SET stok = $stok_up WHERE id_buku = $id_buku";
          $rs = $conn->query($sql_up_stok);
        }

        $pesan="Data Berhasil Dihapus";
        echo "<script> alert('$pesan');</script>";
        header("location:Kembali.php");
        } else {
            $pesan="Data Tidak dihapus";
            echo "<script> alert('$pesan');</script>";
            header("location:Kembali.php");
            
        
    }
?>