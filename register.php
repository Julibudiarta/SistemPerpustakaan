<?php
include("koneksi.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
        <?php 
        
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $jk = $_POST['jk'];
            $age = $_POST['age'];
            $password = $_POST['password'];
            $role ='User';

            //memperivikasi email dan username

        $perivikasi_email = mysqli_query($conn,"SELECT Email FROM users WHERE Email='$email'");
        // $perivikasi_username = mysqli_query($conn,"SELECT Username FROM users WHERE Username='$username'");

        if(mysqli_num_rows($perivikasi_email) !=0 ){
            echo "<div class='message'>
                    <p>Email ini digunakan, Silakan Coba yang Lain!</p>
                </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        // }else if(mysqli_num_rows($perivikasi_username) !=0 ){
        //         echo "<div class='message'>
        //                 <p>Username ini digunakan, Silakan Coba yang Lain!</p>
        //             </div> <br>";
        //         echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        }
        else{
            //id otomatis
            $sql_last_id = "SELECT id_users FROM users ORDER BY id_users DESC LIMIT 1";
            $result = $conn->query($sql_last_id);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $last_id = $row["id_users"];
                    $id_users = ($last_id + 1);
                }else {
                $id_users = "770"."1";
                };
            //end id otomatis
            mysqli_query($conn,"INSERT INTO users(id_users,Username,Email,Jk,Age,Password,Role) 
            VALUES('$id_users','$username','$email','$jk','$age','$password','$role')") or die("Erroe Occured");

            echo "<div class='messageBerhasil'>
                      <p>Registration Berhasil!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
         }

         }else{
         
        ?>
            <div class="form-login">
                <span class="title">Register</span>
            </div>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div>
                    <label for="jk">Jenis Kelamin</label><br>
                    <input type="radio" name="jk" value="l" autocomplete="off" required>
                    <label for="l">Laki-Laki</label><br>
                    <input type="radio" name="jk" value="p" autocomplete="off" required>
                    <label for="p">Perempuan</label><br>
                </div>

                <div class="field input">
                    <label for="age">Umur</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Sudah punya akun? <a href="index.php">Login</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>