<?php
    session_start();
    if(isset($_POST['remove_transaction'])){
        include 'db.php';
        include 'functions.php';
        $o_name = $_POST['name'];
        $o_user = fetch_user_id($_SESSION['username']);
        $query = "SELECT * FROM transactions WHERE name = '$o_name' AND user = '$o_user'";
        $result = $dbconnect->query($query);
        $entry = $result->fetch_assoc();
        $o_amount = $entry['amount'];
        $query = "DELETE FROM transactions WHERE name = '$o_name' AND user = '$o_user'";
        $dbconnect -> query($query);
        $query = "UPDATE accounts SET amount = amount - '$o_amount' WHERE user = '$o_user'";
        $dbconnect -> query($query);
        header("Location: transactions.php");
    }
    if(isset($_POST['remove_account'])){
        include 'db.php';
        include 'functions.php';
        $o_name = $_POST['name'];
        $o_user = fetch_user_id($_SESSION['username']);
        $query = "DELETE FROM accounts WHERE name = '$o_name' AND user = '$o_user'";
        $dbconnect -> query($query);
        header("Location: accounts.php");
    }
    if(isset($_POST['remove_l'])){
        include 'db.php';
        include 'functions.php';
        $o_name = $_POST['name'];
        $o_user = fetch_user_id($_SESSION['username']);
        $query = "SELECT * FROM lends WHERE name = '$o_name' AND user = '$o_user'";
        $result = $dbconnect->query($query);
        $entry = $result->fetch_assoc();
        $o_amount = $entry['amount'];
        $query = "DELETE FROM lends WHERE name = '$o_name' AND user = '$o_user'";
        $dbconnect -> query($query);
        $query = "UPDATE accounts SET amount = amount + '$o_amount' WHERE user = '$o_user'";
        $dbconnect -> query($query);
        header("Location: lends.php");
    }
    if(isset($_POST['remove_b'])){
        include 'db.php';
        include 'functions.php';
        $o_name = $_POST['name'];
        $o_user = fetch_user_id($_SESSION['username']);
        $query = "SELECT * FROM borrows WHERE name = '$o_name' AND user = '$o_user'";
        $result = $dbconnect->query($query);
        $entry = $result->fetch_assoc();
        $o_amount = $entry['amount'];
        $query = "DELETE FROM borrows WHERE name = '$o_name' AND user = '$o_user'";
        $dbconnect -> query($query);
        $query = "UPDATE accounts SET amount = amount - '$o_amount' WHERE user = '$o_user'";
        $dbconnect -> query($query);
        header("Location: borrows.php");
    }

?>