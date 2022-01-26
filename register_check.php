<?php
    include 'db.php';
    include 'functions.php';
    if(isset($_POST['submit'])){
        echo "Submit detected";
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = hash_password($_POST['password']);
        $query = "INSERT INTO users (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
        $dbconnect -> query($query);
        header("Location: login.php");
    }
?>