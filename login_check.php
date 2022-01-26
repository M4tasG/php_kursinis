<?php
    include 'db.php';
    include 'functions.php';
    if(isset($_POST['submit'])){
        echo "Submit detected";
        $username = $_POST['username'];
        $password = hash_password($_POST['password']);
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $dbconnect -> query($query);
        $entry = $result->fetch_assoc();
        if(check_creds($entry, $username, $password)){
            session_start();
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username;
        }
        if(!$dbconnect -> query($query)){
            echo "<div class='change-message error'>Error: " . $dbconnect -> error . "</div>";
        }
        else{
            echo "<div class='change-message success'>User added successfully</div>";
        }
        header("Location: dashboard.php");
    }
?>