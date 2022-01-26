<?php
    function hash_password($password){
        return md5($password);
    }
    function check_creds($dbentry, $username, $password){
        if($dbentry['username'] == $username && $dbentry['password'] == $password){
            return true;
        }
        else{
            return false;
        }
    }
    function fetch_user_id($user){
        include 'db.php';
        $query = "SELECT * FROM users WHERE username = '$user'";
        $result = $dbconnect->query($query);
        $entry = $result->fetch_assoc();
        return $entry['id'];
    }
    function fetch_account_id($acc, $user){
        include 'db.php';
        $query = "SELECT * FROM accounts WHERE name = '$acc' AND user = '$user'";
        $result = $dbconnect->query($query);
        $entry = $result->fetch_assoc();
        return $entry['id'];
    }
    function fetch_accounts($user){
        include 'db.php';
        $user = fetch_user_id($user);
        $query = "SELECT * FROM accounts WHERE user = '$user'";
        $result = $dbconnect->query($query);
        $accounts = array();
        while($entry = $result->fetch_assoc()){
            array_push($accounts, $entry['name']);
        }
        return $accounts;
    }
    function fetch_transactions($user){
        include 'db.php';
        $user = fetch_user_id($user);
        $query = "SELECT * FROM transactions WHERE user = '$user'";
        $result = $dbconnect->query($query);
        $transactions = array();
        while($entry = $result->fetch_assoc()){
            array_push($transactions, $entry['name']);
        }
        return $transactions;
    }
    function fetch_lends($user){
        include 'db.php';
        $user = fetch_user_id($user);
        $query = "SELECT * FROM lends WHERE user = '$user'";
        $result = $dbconnect->query($query);
        $lends = array();
        while($entry = $result->fetch_assoc()){
            array_push($lends, $entry['name']);
        }
        return $lends;
    }
    function fetch_borrows($user){
        include 'db.php';
        $user = fetch_user_id($user);
        $query = "SELECT * FROM borrows WHERE user = '$user'";
        $result = $dbconnect->query($query);
        $borrows = array();
        while($entry = $result->fetch_assoc()){
            array_push($borrows, $entry['name']);
        }
        return $borrows;
    }
?>