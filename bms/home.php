<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="icon" href="/BMS/fast logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .bd {
            margin-top: 50px;
            padding: 50px;
            text-align: center;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            color: white;
        }
    </style>
</head>

<body>

    <?php
    require 'partials/_nav.php'
    ?>

    <div class="bd">
        <h5 style="color:white">WELCOME TO FAST BANK</h5>
        <br>
        <img src="/BMS/fast logo.png" alt="FAST LOGO">
        <br>
        <br><br>
        <div>

            <a class="btn btn-outline-light" href="/BMS/login.php" role="button"> Login </a>
            &nbsp;
            <a class="btn btn-outline-light" href="/BMS/signup.php" role="button"> Signup </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </div>
    <br><br>
    <footer class="footer">
        <div class="p-3 mb-2 bg-dark text-white">
            <p style="text-align:center">© 2022 Copyright</p>
        </div>
    </footer>
</body>

</html>