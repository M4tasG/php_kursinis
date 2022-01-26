<?php
    session_start();
    include 'db.php';
    include 'functions.php';
    if(isset($_POST['add_transaction'])){
        $t_name = $_POST['name'];
        $t_category = $_POST['category'];
        $t_date = $_POST['date'];
        $t_amount = $_POST['amount'];
        $t_userid = fetch_user_id($_SESSION['username']);
        $t_account = fetch_account_id($_POST['account'], $t_userid);
        $query = "INSERT INTO transactions (`name`, `category`, `date`, `amount`, `account`, `user`) VALUES ('$t_name', '$t_category', '$t_date', '$t_amount', '$t_account', '$t_userid')";
        $dbconnect -> query($query);
        $query = "SELECT * FROM accounts WHERE id = '$t_account'";
        $result = $dbconnect -> query($query);
        $entry = $result->fetch_assoc();
        $updated_bal = $entry['balance'] += $t_amount;
        $query = "UPDATE accounts SET balance = '$updated_bal' WHERE id = '$t_account'";
        $dbconnect -> query($query);
        header("Location: transactions.php");
    }
    if(isset($_POST['add_account'])){
        echo "Adding account";
        $a_name = $_POST['name'];
        $a_amount = $_POST['amount'];
        $a_user = fetch_user_id($_SESSION['username']);
        $query = "INSERT INTO accounts (`name`, `balance`, `user`) VALUES ('$a_name', '$a_amount', '$a_user')";
        $dbconnect -> query($query);
        header("Location: accounts.php");
    }
    if(isset($_POST['add_l'])){
        echo "Adding lend";
        $l_name = $_POST['name'];
        $l_amount = $_POST['amount'];
        $l_person = $_POST['person'];
        $l_user = fetch_user_id($_SESSION['username']);
        $l_account = fetch_account_id($_POST['account'], $l_user);
        $query = "INSERT INTO lends (`name`, `person`, `amount`, `user`, `account`) VALUES ('$l_name', '$l_person', '$l_amount', '$l_user', '$l_account')";
        $dbconnect -> query($query);
        $query = "SELECT * FROM accounts WHERE id = '$l_account'";
        $result = $dbconnect -> query($query);
        $entry = $result->fetch_assoc();
        $updated_bal = $entry['balance'] -= $l_amount;
        $query = "UPDATE accounts SET balance = '$updated_bal' WHERE id = '$l_account'";
        $dbconnect -> query($query);
        header("Location: lends.php");
    }
    if(isset($_POST['add_b'])){
        echo "Adding borrow";
        $l_name = $_POST['name'];
        $l_amount = $_POST['amount'];
        $l_person = $_POST['person'];
        $l_user = fetch_user_id($_SESSION['username']);
        $l_account = fetch_account_id($_POST['account'], $l_user);
        $query = "INSERT INTO borrows (`name`, `person`, `amount`, `user`, `account`) VALUES ('$l_name', '$l_person', '$l_amount', '$l_user', '$l_account')";
        $dbconnect -> query($query);
        $query = "SELECT * FROM accounts WHERE id = '$l_account'";
        $result = $dbconnect -> query($query);
        $entry = $result->fetch_assoc();
        $updated_bal = $entry['balance'] += $l_amount;
        $query = "UPDATE accounts SET balance = '$updated_bal' WHERE id = '$l_account'";
        $dbconnect -> query($query);
        header("Location: borrows.php");
    }
?>