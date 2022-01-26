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
        echo $entry['username'];
        return $entry['id'];
    }
    function fetch_account_id($acc, $user){
        include 'db.php';
        $query = "SELECT * FROM accounts WHERE name = '$acc' AND user = '$user'";
        $result = $dbconnect->query($query);
        $entry = $result->fetch_assoc();
        echo $entry['name'];
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
?>