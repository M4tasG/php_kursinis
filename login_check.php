<?php
    include 'db.php';
    include 'functions.php';
    if(isset($_POST['submit'])){
        echo "Submit detected";
        $username = $_POST['username'];
        $username = validate_login_creds($username);
        $password = hash_password($_POST['password']);
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $dbconnect -> query($query);
        $entry = $result->fetch_assoc();
        if(check_creds($entry, $username, $password)){
            session_start();
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username;
        }
        header("Location: dashboard.php");
    }
?>