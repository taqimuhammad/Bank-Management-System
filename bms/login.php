<?php include('server.php') ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="icon" href="/BMS/fast logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    h5 {
      text-align: center;
      color: white;
    }

    .footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      /* Set the fixed height of the footer here */
      height: 60px;
      color: white;
    }

    .loginBox {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 350px;
      height: 420px;
      padding: 70px 40px;
      box-sizing: border-box;
      background: rgba(0, 0, 0, 0.5);
    }

    h2 {
      margin: 0;
      padding: 0 0 26px;
      color: #ff8c00;
      text-align: center;
    }

    .loginBox p {
      margin: 0;
      padding: 0;
      font-weight: bold;
      color: #fff;
    }

    .loginBox input {
      width: 100%;
      margin-bottom: 20px;
    }

    .loginBox input[type="text"],
    .loginBox input[type="password"] {
      border: none;
      border-bottom: 1px solid #fff;
      background: transparent;
      outline: none;
      height: 40px;
      color: #fff;
      font-size: 16px;
    }

    ::placeholder {
      color: rgba(255, 255, 255, 0.5);
    }

    .loginBox input[type="submit"] {
      border: none;
      outline: none;
      height: 40px;
      color: black;
      font-size: 16px;
      background-color: white;
      cursor: pointer;
      border-radius: 20px;
      margin: 12px 0 18px;
    }

    .loginBox input[type="submit"]:hover {
      background-color: white;
      color: gray;
    }

    .loginBox a {
      color: #fff;
      font-size: 14px;
      font-weight: bold;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <?php
  require 'partials/_nav.php'
  ?>
  <div class="container">
    <br><br>
    <h5>LOGIN</h5>
    <div class="container">
    </div>
    <div class="loginBox">
      <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <p>Username</p>
        <input type="text" name="username" placeholder="Enter Username" required>
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password">
        <button class="btn btn-primary" type="submit" onclick="alertFunction()" name="login_user">Login</button>
        <p><br>
          Not yet a member? <a href="signup.php">Sign up</a>
        </p><br>
        <p>
          Login as an Admin : <a href="admin.php">Admin</a>
        </p>
      </form>
    </div>
  </div>
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <script>
    function alertFunction() {
      alert("Login Successful");
    }
  </script>
  <footer class="footer">
    <div class="p-3 mb-2 bg-dark text-white">
      <p style="text-align:center">© 2022 Copyright</p>
    </div>
  </footer>
</body>

</html>