<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Gagal</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="container">
    <div class="box form-box">
    <?php
    include("koneksi.php");
    session_start();

        if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        //Cek Data
        $queryUser = mysqli_query($conn,"SELECT * FROM users WHERE Username='$username' AND Password='$password' ") or die("Select Error");
        $queryAdmin = mysqli_query($conn,"SELECT * FROM admin WHERE Username='$username' AND Password='$password' ") or die("Select Error");
        if(mysqli_num_rows($queryUser)==1){
            echo "Login User Berhasil";
        }elseif(mysqli_num_rows($queryAdmin)==1){
            echo "Login Admin Berhasil";
        }else{
            
        }
            
            //User
            $resultUser = mysqli_fetch_array($queryUser);
            $resultAdmin = mysqli_fetch_array($queryAdmin);

        if(is_array($resultUser) && !empty($resultUser)){
            $_SESSION['user'] = $resultUser['Username'];
            $_SESSION['id_user'] = $resultUser['id_users'];
            $_SESSION['email'] = $resultUser['Email'];
            $_SESSION['is_login'] = true;
            $_SESSION['age'] = $resultUser['Age'];
            $_SESSION['role']=$resultUser['Role'];

            //Admin
        }elseif(is_array($resultAdmin) && !empty($resultAdmin)){
                $_SESSION['admin'] = $resultAdmin['Username'];
                $_SESSION['id_admin'] = $resultUser['Id_admin'];
                $_SESSION['is_login'] = true;
                $_SESSION['role']=$resultAdmin['Role'];
        }else{
            
            echo "<div class='message'>
                    <p>Username atau Password salah</p>
                </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        }
            //cek akses
            if(isset($_SESSION['user'])){
                header("location:user/user.php");
            }elseif(isset($_SESSION['admin'])){
                header("location:admin/index.php");
            }
            
        }
    ?>
    </div>
    </div>
</body>
</html>