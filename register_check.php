<?php
    include 'db.php';
    include 'functions.php';
    if(isset($_POST['submit'])){
        echo "Submit detected";
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = hash_password($_POST['password']);
        if(!@check_for_dupe_username($username) && !@check_for_dupe_email($email)){
            $clean_credentials = validate_register_creds($username, $email);
            $username = $clean_credentials['username'];
            $email = $clean_credentials['email'];
            $query = "INSERT INTO users (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
            $dbconnect -> query($query);
            header("Location: login.php");
        }
        else{
            echo "<div class='change-message error'>Error: Username or email already exists</div>";
        }
    }
?>