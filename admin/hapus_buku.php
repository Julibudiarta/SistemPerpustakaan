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
    $id = $_GET['id'];
    $sql_hp_arsip="DELETE FROM arsip WHERE id_buku = $id";
    mysqli_query($conn,$sql_hp_arsip);
    $sql_hp_riwayat="DELETE FROM riwayat WHERE id_buku = $id";
    mysqli_query($conn,$sql_hp_riwayat);
    try {
        $sql = "DELETE FROM buku WHERE id_buku=$id";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            header("location:index.php");
        } else {
            throw new Exception("Buku tidak dapat dihapus karena masih ada peminjam.");
        }
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
        echo "<script>alert('Buku tidak dapat dihapus karena masih ada peminjam.'); window.location.href = 'index.php';</script>";
    }
?>