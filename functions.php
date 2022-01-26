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
    function check_for_dupe_username($var){
        include 'db.php';
        $query = "SELECT * FROM users WHERE username = '$var'";
        $result = $dbconnect -> query($query);
        $entry = $result->fetch_assoc();
        if($entry['username'] == $var){
            return true;
        }
        else{
            return false;
        }
    }
    function check_for_dupe_email($var){
        include 'db.php';
        $query = "SELECT * FROM users WHERE email = '$var'";
        $result = $dbconnect -> query($query);
        $entry = $result->fetch_assoc();
        if($entry['email'] == $var){
            return true;
        }
        else{
            return false;
        }
    }
    function validate_register_creds($username, $email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_STRING) && filter_var($username, FILTER_SANITIZE_STRING)){
            $clean_credentials = array();
            $clean_credentials['username'] = $username;
            $clean_credentials['email'] = $email;
            return $clean_credentials;
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
    function fetch_transaction_amounts($user){
        include 'db.php';
        $user = fetch_user_id($user);
        $query = "SELECT * FROM transactions WHERE user = '$user'";
        $result = $dbconnect->query($query);
        $transactions = array();
        while($entry = $result->fetch_assoc()){
            array_push($transactions, $entry['amount']);
        }
        return $transactions;
    }
    function fetch_lend_amounts($user){
        include 'db.php';
        $user = fetch_user_id($user);
        $query = "SELECT * FROM lends WHERE user = '$user'";
        $result = $dbconnect->query($query);
        $lends = array();
        while($entry = $result->fetch_assoc()){
            array_push($lends, $entry['amount']);
        }
        return $lends;
    }
    function fetch_borrow_amounts($user){
        include 'db.php';
        $user = fetch_user_id($user);
        $query = "SELECT * FROM borrows WHERE user = '$user'";
        $result = $dbconnect->query($query);
        $borrows = array();
        while($entry = $result->fetch_assoc()){
            array_push($borrows, $entry['amount']);
        }
        return $borrows;
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
    function calculate_change($user){
        include 'db.php';
        $transactions = fetch_transaction_amounts($user);
        $lends = fetch_lend_amounts($user);
        $borrows = fetch_borrow_amounts($user);
        $change = 0;
        foreach($transactions as $transaction){
            $change += (float)$transaction;
        }
        foreach($lends as $lend){
            $change -= (float)$lend;
        }
        foreach($borrows as $borrow){
            $change += (float)$borrow;
        }
        return $change;
    }
    function calculate_gain($user){
        include 'db.php';
        $transactions = fetch_transaction_amounts($user);
        $borrows = fetch_borrow_amounts($user);
        $gain = 0;
        foreach($transactions as $transaction){
            if((float)$transaction > 0){
                $gain += (float)$transaction;
            }
        }
        foreach($borrows as $borrow){
            $gain += (float)$borrow;
        }
        return $gain;
    }
    function calculate_loss($user){
        include 'db.php';
        $transactions = fetch_transaction_amounts($user);
        $lends = fetch_lend_amounts($user);
        $loss = 0;
        foreach($transactions as $transaction){
            if((float)$transaction < 0){
                $loss += (float)$transaction;
            }
        }
        foreach($lends as $lend){
            $loss -= (float)$lend;
        }
        return $loss;
    }

?>