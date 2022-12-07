<?php

$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'bankmanagementsystem');

if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

// signup USER

if (isset($_POST['signup_user'])) {

  $customer_name = mysqli_real_escape_string($db, $_POST['customer_name']);
  $cnic = mysqli_real_escape_string($db, $_POST['cnic']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $acc_type = mysqli_real_escape_string($db, $_POST['acc_type']);
  $balance = mysqli_real_escape_string($db, $_POST['balance']);
  $bank_name = mysqli_real_escape_string($db, $_POST['bank_name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($customer_name)) {
    array_push($errors, "Name is required");
  }
  if (empty($cnic)) {
    array_push($errors, "CNIC is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }


  $user_check_query = "SELECT * FROM `customer` WHERE `customer`.`customer_ID`='$cnic' AND `customer`.`customer_name`='$customer_name' LIMIT 1";

  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    array_push($errors, "This user already exists");
  }

  // Finally, register user if there are no errors in the form

  if (count($errors) == 0) {
    $password = md5($password); //encrypt the password before saving in the database

    $acc_ID = rand(1, 2147483647);

    $query = "INSERT INTO `account` (`acc_ID`, `acc_type`, `balance`) VALUES ('$acc_ID', '$acc_type', '$balance')";
    mysqli_query($db, $query);

    $loan_ID = rand(1, 100);

    $query = "INSERT INTO `branch` (`branch_ID`, `address`, `acc_ID`,`loan_ID`) VALUES (NULL, '$address', '$acc_ID','$loan_ID')";
    mysqli_query($db, $query);

    $user_check_query = "SELECT * FROM `branch` WHERE `branch`.`acc_ID`='$acc_ID' LIMIT 1";

    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    $query = "INSERT INTO `bank` (`bank_ID`, `bank_name`, `branch_ID`) VALUES (NULL, '$bank_name', '$user[branch_ID]')";
    mysqli_query($db, $query);

    $query = "INSERT INTO `loan` (`loan_ID`, `amount`, `acc_ID`) VALUES ('$loan_ID', '0', '$acc_ID')";
    mysqli_query($db, $query);

    $query = "INSERT INTO `customer` (`customer_ID`, `customer_name`, `age`, `phone`, `address`, `password`,`acc_ID`) VALUES ('$cnic', '$customer_name', '$age', '$phone', '$address', '$password','$acc_ID')";
    mysqli_query($db, $query);

    $_SESSION['username'] = $customer_name;
    $_SESSION['acc_ID'] = $acc_ID;
    $_SESSION['success'] = "You are now logged in";
    header('location: home.php');
  }
}

// LOGIN USER

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM `customer` WHERE `customer_name`='$username' AND `password`='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: utility.php');
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

// ADMIN LOGIN

if (isset($_POST['admin_login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    // $password = md5($password);
    $query = "SELECT * FROM `admin` WHERE `adminid`='$username' AND `password`='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Admin Panel";
      header('location: adminpanel.php');
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}


// Transfer users

if (isset($_POST['transfer_user'])) {
  $sender_ID = mysqli_real_escape_string($db, $_POST['sender_ID']);
  $receiver_ID = mysqli_real_escape_string($db, $_POST['receiver_ID']);
  $amount = mysqli_real_escape_string($db, $_POST['amount']);
  if (empty($sender_ID)) {
    array_push($errors, "Account No. is required");
  }
  if (empty($receiver_ID)) {
    array_push($errors, "Account No. is required");
  }
  if (empty($amount)) {
    array_push($errors, "Amount is required");
  }
  if (count($errors) == 0) {
    $query = "SELECT * FROM `account` WHERE `account`.`acc_ID`='$sender_ID' AND `account`.`balance`>='$amount' LIMIT 1";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $query = "SELECT * FROM `account` WHERE `account`.`acc_ID`='$receiver_ID' LIMIT 1";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {

        $query = "INSERT INTO `transfer` (`transfer_ID`, `amount`, `acc_ID_sender`,`acc_ID_receiver`) VALUES (NULL, '$amount', '$sender_ID','$receiver_ID')";
        mysqli_query($db, $query);

        $query = "UPDATE `account` SET `balance` = (SELECT `account`.`balance`+'$amount' FROM DUAL) WHERE `account`.`acc_ID` = '$receiver_ID'";
        $results = mysqli_query($db, $query);

        $query = "UPDATE `account` SET `balance` = (SELECT `account`.`balance`-'$amount' FROM DUAL) WHERE `account`.`acc_ID` = '$sender_ID'";
        $results = mysqli_query($db, $query);

        if (!$results) {
          array_push($errors, "Could not transfer");
        }
      } else {
        array_push($errors, "Wrong Receiver's Account No. Or Insufficient Balance.");
      }
    } else {
      array_push($errors, "Wrong Account No. of Sender");
    }
  } else {
    array_push($errors, "Error Sending");
  }
}

// Application for loan

if (isset($_POST['apply_loan'])) {
  $acc_ID = mysqli_real_escape_string($db, $_POST['acc_ID']);
  $amount = mysqli_real_escape_string($db, $_POST['amount']);
  $installment = mysqli_real_escape_string($db, $_POST['installment']);
  if (empty($acc_ID)) {
    array_push($errors, "Account No. is required");
  }
  if (empty($amount)) {
    array_push($errors, "Amount is required");
  }
  if (empty($installment)) {
    array_push($errors, "Installment months required");
  }
  if (count($errors) == 0) {
    $query = "SELECT * FROM `loan` WHERE `loan`.`acc_ID`='$acc_ID' LIMIT 1";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $query = "UPDATE `loan` SET `amount` = (SELECT `loan`.`amount`+'$amount' FROM DUAL) WHERE `loan`.`acc_ID` = '$acc_ID'";
      $results = mysqli_query($db, $query);
      $query = "UPDATE `account` SET `balance` = (SELECT `account`.`balance`+'$amount' FROM DUAL) WHERE `account`.`acc_ID` = '$acc_ID'";
      $results = mysqli_query($db, $query);
    }
  }
}

// Pay loan

if (isset($_POST['pay_loan'])) {
  $acc_ID = mysqli_real_escape_string($db, $_POST['acc_ID']);
  $amount = mysqli_real_escape_string($db, $_POST['amount']);
  $month = mysqli_real_escape_string($db, $_POST['month']);
  if (empty($acc_ID)) {
    array_push($errors, "Account No. is required");
  }
  if (empty($amount)) {
    array_push($errors, "Amount is required");
  }
  if (empty($month)) {
    array_push($errors, "Month name required");
  }
  if (count($errors) == 0) {
    $query = "SELECT * FROM `loan` WHERE `loan`.`acc_ID`='$acc_ID' LIMIT 1";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $query = "UPDATE `loan` SET `amount` = (SELECT `loan`.`amount`-'$amount' FROM DUAL) WHERE `loan`.`acc_ID` = '$acc_ID'";
      $results = mysqli_query($db, $query);
      $query = "UPDATE `account` SET `balance` = (SELECT `account`.`balance`-'$amount' FROM DUAL) WHERE `account`.`acc_ID` = '$acc_ID'";
      $results = mysqli_query($db, $query);
    }
  }
}

// bill payments

if (isset($_POST['bill_payment'])) {
  $bill_ID = mysqli_real_escape_string($db, $_POST['bill_ID']);
  $acc_ID = mysqli_real_escape_string($db, $_POST['acc_ID']);
  $amount = mysqli_real_escape_string($db, $_POST['amount']);
  if (empty($bill_ID)) {
    array_push($errors, "Bill No. is required");
  }
  if (empty($acc_ID)) {
    array_push($errors, "Account No. is required");
  }
  if (empty($amount)) {
    array_push($errors, "Amount is required");
  }
  if (count($errors) == 0) {
    $query = "SELECT * FROM `account` WHERE `account`.`acc_ID`='$acc_ID' AND `account`.`balance`>='$amount' LIMIT 1";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $query = "INSERT INTO `bill` (`bill_ID`, `amount`, `acc_ID`) VALUES ('$bill_ID', '$amount', '$acc_ID')";
      $result = mysqli_query($db, $query);
      $query = "UPDATE `account` SET `balance` = (SELECT `account`.`balance`-'$amount' FROM DUAL) WHERE `account`.`acc_ID` = '$acc_ID'";
      $results = mysqli_query($db, $query);
    } else {
      array_push($errors, "Incorrect Credentials, Please try again.");
    }
  }
}

// display data

if (isset($_POST['show_data'])) {
  $query = "SELECT * FROM `alldata`";
  $result = mysqli_query($db, $query);
  $total = mysqli_num_rows($result);
?>

  <head>
    <link rel="icon" href="/BMS/fast logo.png" type="image/x-icon">
  </head>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      text-align: center;
    }

    th {
      background-color: #dddddd;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: center;
      padding: 8px;
    }

    tr:hover {
      background-color: #dddddd;
    }
  </style>

  <body>

    <table>
      <tr>
        <th>Customer name</th>
        <th>Phone</th>
        <th>Balance</th>
        <th>Account type</th>
        <th>Branch</th>
        <th>Bank Name</th>
        <th>Operations</th>
      </tr>
      <?php
      if ($total != 0) {
        while ($data = mysqli_fetch_assoc($result)) {
          echo "<tr>
        <td>" . $data['customer_name'] . "</td>
        <td>" . $data['phone'] . "</td>
        <td>" . $data['balance'] . "</td>
        <td>" . $data['acc_type'] . "</td>
        <td>" . $data['branch_ID'] . "</td>
        <td>" . $data['bank_Name'] . "</td>
        <td><a href='#' onclick='editData()'>Edit</a> <a href='#' onclick='deleteData()'>Delete</a></td>
        </tr> <br>";
        }
      ?>
    </table>
    <script>
      function deleteData() {
        alert("Record has been deleted.");
      }

      function editData() {
        alert("Cannot Edit.");
      }
    </script>
  </body>
<?php
      } else {
        array_push($errors, "No data found.");
      }
    }
