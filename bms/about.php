<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About</title>
    <link rel="icon" href="/BMS/fast logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        h5 {
            color: white;
            text-align: center;
        }

        p {
            margin-left: 20px;
            margin-right: 20px;
        }

        body {
            text-align: left;
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
    </style>
</head>

<body>
    <?php
    require 'partials/_nav.php'
    ?>
    <br><br>
    <h5>About</h5>
    <br><br>
    <div>
        <p>This is our Database Semester Project.<br>
            It consitutes of a Mini Bank Management System where we have tried to apply the principles of Database taught to us in the course.
            Functionalties such as Transfer from one account to another and loan and bill payments are also included.Option of installments is also present.
            User will have to signup and put their details which will be saved in the database and they can also update their details.
            <br>Technologies used are Html,Css,Bootstrap for frontend.
            For backend Php and MySql Database.<br><br>
            Group Members are: <br>
            Sanan Baig 20K-0165 <br>
            Taqi Muhammad 20K-0411 <br>
            Awwab Sabir 20K-0165
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