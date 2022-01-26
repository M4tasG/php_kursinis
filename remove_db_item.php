<?php
    session_start();
    if(isset($_POST['remove_transaction'])){
        include 'db.php';
        include 'functions.php';
        $o_name = $_POST['name'];
        $o_user = fetch_user_id($_SESSION['username']);
        $query = "DELETE FROM transactions WHERE name = '$o_name' AND user = '$o_user'";
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
        $query = "DELETE FROM lends WHERE name = '$o_name' AND user = '$o_user'";
        $dbconnect -> query($query);
        header("Location: lends.php");
    }
    if(isset($_POST['remove_b'])){
        include 'db.php';
        include 'functions.php';
        $o_name = $_POST['name'];
        $o_user = fetch_user_id($_SESSION['username']);
        $query = "DELETE FROM borrows WHERE name = '$o_name' AND user = '$o_user'";
        $dbconnect -> query($query);
        header("Location: borrows.php");
    }

?>