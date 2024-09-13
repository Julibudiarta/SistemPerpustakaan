<?php
include"../koneksi.php";
session_Start();

      $id_users=$_SESSION['id_user'];
      $sql = "SELECT * FROM users WHERE id_users=?";
      
      // Persiapan statement menggunakan prepared statement
      $stmt = mysqli_prepare($conn, $sql);
      
      // Bind parameter ke statement
      mysqli_stmt_bind_param($stmt, "i", $id_users);
      
      // Eksekusi statement
      mysqli_stmt_execute($stmt);
      
      // Ambil hasil query
      $result = mysqli_stmt_get_result($stmt);
      
      $row = mysqli_fetch_assoc($result);
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
        <title>Profil</title>

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
         <!------------ And SideBar ------------>
        <div class="p-4 bg-primary text-white" id="main-content" style="height:30px; display:flex; align-items:center;" >
            <button class="btn btn-outline-light" id="button-toggle">
             <i class="bi bi-list"></i>
            </button>
            <h4 class="mb-9 text-white"><span>Perpustakaan</span></h4>
        </div>
        <!--card-->
        <div id="main-content2">
        <div class="position-absolute top-50 start-50 translate-middle">
  <div class="card mb-3 p-4" style="max-width: 1000%;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="aset/kartu.png" class="img-fluid rounded-start" alt="kartu">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title" style="font-weight: bold; font-size: 20px;">Kartu anggota</h5>
          <p class="card-text" style="font-size: 20px;">ID: <?php echo " " . $row['id_users']; ?></p>
          <p class="card-text" style="font-size: 20px;">Nama: <?php echo " " . $row['Username']; ?></p>
          <p class="card-text" style="font-size: 20px;">Umur: <?php echo " " . $row['Age']; ?></p>
          <p class="card-text" style="font-size: 20px;">Jenis Kelamin: <?php echo " " . $row['Jk']; ?></p>
        </div>
      </div>
    </div>
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