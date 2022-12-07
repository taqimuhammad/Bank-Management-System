<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link rel="icon" href="/BMS/fast logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        h5,
        body {
            color: White;
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
        .p{
            text-align:left;
            margin-left:20px;
        }
    </style>
</head>

<body>
    <?php
    require 'partials/_nav.php'
    ?>
    <br><br><br>
    <h5>Contact Us</h5><br><br>
    <div class="p">
        <p>This is a Database Project Made by Students of FAST-NUCES.<br><br>
            <b>Sanan Baig</b><Br>
            Email Address: k200165@nu.edu.pk<br><br>
            <b>Taqi Muhammad</b><br>
            Email Address: k200411@nu.edu.pk<br><br>
            <b>Awwab Sabir</b><br>
            Email Address: k201165@nu.edu.pk
            <br>
            <br>
            For Any Queries or Questions feel free to reach out to us
        </p>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <footer class="footer">
        <div class="p-3 mb-2 bg-dark text-white">
            <p style="text-align:center">© 2022 Copyright</p>
        </div>
    </footer>
</body>

</html>