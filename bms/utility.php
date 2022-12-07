<?php include('errors.php') ?>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    unset($_SESSION['acc_ID']);
    session_destroy();
    header("location: login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Utilities</title>
    <link rel="icon" href="/BMS/fast logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        h5 {
            text-align: center;
            color: White;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            color: white;
        }
        
        .noMargin {
             margin: 5px;
         }

        .one {
            
        }

        .two {
            
        }

        .three {
            
        }

        .four {
            
        }
    </style>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    require 'partials/_nav.php'
    ?>
    <?php if (isset($_SESSION['success']) && isset($_SESSION['username'])) : ?>
        <div class="error success" style="text-align:center">
            <h3>
                <?php
                echo $_SESSION['success'];
                ?><br><br>
                <p style="color:aliceblue">Welcome , <?php echo $_SESSION['username']; ?></p>
               <!-- <p> <a href="utility.php?logout='1'" style="color: red;">logout</a> </p> -->
            </h3>
        </div>
        <br><br>
    <?php endif ?>
<div class="container-fluid">
    <div class="row noMargin">
        <br><br>
        <div class="col one" style="text-align:center">
            <h5>Bill Payment</h5><br>
            <form method="post" action="utility.php" style="color:white">
                <?php include('errors.php'); ?>
                <p>Bill No.</p>
                <input type="text" name="bill_ID" placeholder="Enter Bill No." required>
                <p>Account No.</p>
                <input type="text" name="acc_ID" placeholder="Enter Account No." required>
                <p>Amount</p>
                <input type="number" name="amount" placeholder="Enter Amount">
                <p>
                    <br>
                    <button class="btn btn-primary" type="submit" onclick="alertFunction()" name="bill_payment">Pay</button>
                </p>
            </form>
        </div>
        <br><br>
        <div class="col two" style="text-align:center">
            <h5>Apply for Loan</h5><br>
            <form method="post" action="utility.php" style="color:white">
                <?php include('errors.php'); ?>
                <p>Account No.</p>
                <input type="text" name="acc_ID" placeholder="Enter Account No." required>
                <p>Amount</p>
                <input type="number" name="amount" placeholder="Enter Amount">
                <p>Installment Plan</p>
                <input type="number" name="installment" placeholder="Enter Months">
                <p>
                    <br>
                    <button class="btn btn-primary" type="submit" onclick="alertFunction()" name="apply_loan">Apply</button>
                </p>
            </form>
        </div>
   
        <br><br>
        <div class="col three" style="text-align:center">
            <h5>Pay Installment</h5><br>
            <form method="post" action="utility.php" style="color:white">
                <?php include('errors.php'); ?>
                <p>Account No.</p>
                <input type="text" name="acc_ID" placeholder="Enter Account No." required>
                <p>Amount</p>
                <input type="number" name="amount" placeholder="Enter Amount">
                <p>Month</p>
                <input type="number" name="month" placeholder="Enter Month:">
                <p>
                    <br>
                    <button class="btn btn-primary" type="submit" onclick="alertFunction()" name="pay_loan">Pay</button>
                </p>
            </form>
        </div>
        <br><br>
        <div class="col four" style="text-align:center">
            <h5>Transfer</h5><br>
            <form method="post" action="utility.php" style="color:white">
                <?php include('errors.php'); ?>
                <p>Account No. of Sender</p>
                <input type="text" name="sender_ID" placeholder="Enter Account No." required>
                <p>Account No. of Receiver</p>
                <input type="text" name="receiver_ID" placeholder="Enter Account No." required>
                <p>Amount</p>
                <input type="number" name="amount" placeholder="Enter Amount">
                <p>
                    <br>
                    <button class="btn btn-primary" type="submit" onclick="alertFunction()" name="transfer_user">Transfer</button>
                </p>
            </form><br><br>
          <!--  <p> <a href="utility.php?logout='1'" style="color: red;">logout</a> </p> -->
            <a href="utility.php?logout='1'" class="btn btn-light" role="button" aria-pressed="true">Logout</a>
        </div>
    </div>
    <br><br>
</div>
    <script>
        function alertFunction() {
            alert("Successful");
        }
    </script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <footer class="footer">
        <div class="p-3 mb-2 bg-dark text-white">
            <p style="text-align:center">© 2022 Copyright</p>
        </div>
    </footer>
</body>

</html>