<?php include('server.php') ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link rel="icon" href="/BMS/fast logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        h5 {
            text-align: center;
            color: white;
        }

        .col-md-6,
        .col-12,
        .col-md-4,
        .col-md-2,
        .col-md-3 {
            color: white;
        }

        .space {
            margin-left: 10px;
            margin-right: 10px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    require 'partials/_nav.php'
    ?>
    <div class="container">
        <br>
        <h5>SIGN UP</h5>
        <br>
    </div>
    <div class="space">
        <form class="row g-3" method="post" action="signup.php">
            <?php include('errors.php'); ?>
            <div class="col-md-4">
                <label for="inputFullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="customer_name" aria-label="Full name">
            </div>
            <div class="col-md-4">
                <label for="inputcnic" class="form-label">CNIC</label>
                <input type="text" class="form-control" name="cnic" aria-label="cnic">
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail4">
            </div>
            <div class="col-md-2">
                <label for="inputphone4" class="form-label">Age</label>
                <input type="number" class="form-control" name="age" id="inputage4" required>
            </div>
            <div class="col-md-4">
                <label for="inputphone4" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" id="inputphone4" required>
            </div>
            <div class="col-md-4">
                <label for="inputAccount" class="form-label">Account Type</label>
                <select id="inputAccount" class="form-select" name="acc_type" required>
                    <option selected>Choose...</option>
                    <option>Current</option>
                    <option>Savings</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity" name="city" required>
            </div>
            <div class="col-md-3">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select" name="state" required>
                    <option selected>Choose...</option>
                    <option>Sindh</option>
                    <option>Punjab</option>
                    <option>Balochistan</option>
                    <option>Khyber Pakhtoonkhwa</option>
                    <option>Gilgit Baltistan</option>
                    <option>Others</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputBankName" class="form-label">Bank name</label>
                <input type="text" class="form-control" name="bank_name" aria-label="Bank name" required>
            </div>
            <div class="col-md-4">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St" required>
            </div>
            <div class="col-md-4">
                <label for="inputBalance" class="form-label">Balance</label>
                <input type="number" class="form-control" name="balance" id="inputBalance" placeholder="$" required>
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="********" required>
            </div>
            <div class=" col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        * I agree with the terms and conditions
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-primary" name="signup_user">Sign Up</button>
            </div>
        </form>
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