<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/BMS/fast logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-image: url('img.jpg');
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-size: cover;
        }

        .login-box {
            width: 280px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #191970;
        }

        .login-box h1 {
            float: left;
            font-size: 40px;
            border-bottom: 4px solid #191970;
            margin-bottom: 50px;
            padding: 13px;
        }

        .textbox {
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px 0;
            margin: 8px 0;
            border-bottom: 1px solid #191970;
        }

        .fa {
            width: px;
            float: left;
            text-align: center;
        }

        .textbox input {
            border: none;
            outline: none;
            background: none;
            font-size: 18px;
            float: left;
            margin: 0 10px;
        }

        .button {
            width: 100%;
            padding: 8px;
            color: #ffffff;
            background: none #191970;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            color: black;
        }
    </style>
    <title>Admin Login</title>
</head>

<body>
    <form action="admin.php" method="post">
        <?php include('errors.php'); ?>
        <div class="login-box">
            <h1>Admin Login</h1>

            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" name="username" value="">
            </div>

            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="password" value="">
            </div>
            <input class="button" type="submit" name="admin_login" value="Sign In">
            <p>
                Not an Admin? <a href="login.php">User login</a>
            </p>
        </div>
    </form>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <footer class="footer">
        <div class="p-3 mb-2 bg-dark text-white">
            <p style="text-align:center">© 2022 Copyright</p>
        </div>
    </footer>
</body>

</html>