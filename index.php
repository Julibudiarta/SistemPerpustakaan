<?php
    include('koneksi.php');
	session_start();
	
	if(isset($_SESSION['is_login'])){
		$role = $_SESSION["role"];
		if($_SESSION["role"]=="Admin"){
			header("location:admin/admin.php");
		}elseif($_SESSION["role"]=="User"){
			header("location:user/user.php");
		}
        else{

        }
	}
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css -->
    <link rel="stylesheet" href="style/style.css">
    <!-- link bootstrap -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
        
            <div class="form-login">
                <span class="title">Login</span>
            </div>
            <!-- <header>Login</header> -->
            <form action="login.php" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Belum punya akun? <a href="register.php">Register</a>
                </div>
            </form>
        </div>
        
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>