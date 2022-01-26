<?php
    session_start();
    include 'db.php';
    if(isset($_POST['add_transaction'])){
        $t_name = $_POST['name'];
        $t_category = $_POST['category'];
        $t_date = $_POST['date'];
        $t_amount = $_POST['amount'];
        $query = "INSERT INTO transactions (`name`, `category`, `date`, `amount`) VALUES ('$t_name', '$t_category', '$t_date', '$t_amount')";
        if(!$dbconnect -> query($query)){
            echo "<div class='change-message error'>Error: " . $dbconnect -> error . "</div>";
        }
        else{
            echo "<div class='change-message success'>Transaction added successfully</div>";
        }
    }
    if(isset($_POST['add_account'])){
        echo "Adding account";
        $a_name = $_POST['name'];
        $a_amount = $_POST['amount'];
        $a_user = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '$a_user'";
        $result = $dbconnect -> query($query);
        $entry = $result->fetch_assoc();
        $a_user = $entry['id'];
        $query = "INSERT INTO accounts (`name`, `balance`, `user`) VALUES ('$a_name', '$a_amount', '$a_user')";
        if(!$dbconnect -> query($query)){
            echo "<div class='change-message error'>Error: " . $dbconnect -> error . "</div>";
        }
        else{
            echo "<div class='change-message success'>Account added successfully</div>";
        }
        header("Location: accounts.php");
    }
?>