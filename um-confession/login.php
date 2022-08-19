<?php
require 'backend/function.php';

// if(!empty($_SESSION["id"])){
//   header("Location: login.php");
// }

$login = new Login();

if(isset($_POST["submit"])){
  $result = $login->login($_POST["email"], md5($_POST["password"]));

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: dashboard.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Wrong Password'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/css/form.css">
</head>
<body>
    <section class="sign-container">
        <nav class="nav-header-sign_up">
            <ul>
                <h3 class="animate-charcter"> UMConfession</h3>
                <li>
                    <a href="#" onclick="loginAlert()">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" onclick="loginAlert()">
                        New Admin
                    </a>
                </li>
                <li>
                    <a href="post.php">
                        Back to User
                    </a>
                </li>
            </ul>
        </nav>
        <div class="form-container">
            <div class="form-content">
                <h2 class="header_form-content">
                    Log in as Admin
                </h2>
                <form action="" class="formField" method="POST">
                    <div class="form-group">
	                    <label for="username">Email</label>
	                    <input type="email" name="email" id="email" autocomplete="off" required value="">
	                </div>
                    <div class="form-group">
	                    <label for="password">Password</label>
	                    <input type="password" name="password" id="password" autocomplete="off" required value="">
	                </div>
                    <div class="s-password">
                        <input type="checkbox" class="form-checkbox" id="s-password" onclick="showLoginPassword()">
                        <label for="s-password">Show Password</label>
                    </div>
                    <div class="form-btn-wrapper">
                        <button type="submit" class="btn-form" name="submit">Log In</button>
                        <input type="checkbox" class="form-checkbox" id="check" name="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="frontend/js/showPassword.js"></script>
    <script src="frontend/js/loginAlert.js"></script>
</body>
</html>