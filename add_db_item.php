<?php
    session_start();
    include 'db.php';
    include 'functions.php';
    if(isset($_POST['add_transaction'])){
        $t_name = $_POST['name'];
        $t_category = $_POST['category'];
        $t_date = $_POST['date'];
        $t_amount = $_POST['amount'];
        $t_account = fetch_account_id($_POST['account'], fetch_user_id($_SESSION['username']));
        $query = "INSERT INTO transactions (`name`, `category`, `date`, `amount`, `account`) VALUES ('$t_name', '$t_category', '$t_date', '$t_amount', '$t_account')";
        if(!$dbconnect -> query($query)){
            echo "<div class='change-message error'>Error: " . $dbconnect -> error . "</div>";
        }
        else{
            echo "<div class='change-message success'>Transaction added successfully</div>";
        }
        $query = "SELECT * FROM accounts WHERE id = '$t_account'";
        $result = $dbconnect -> query($query);
        $entry = $result->fetch_assoc();
        $updated_bal = $entry['balance'] += $t_amount;
        $query = "UPDATE accounts SET balance = '$updated_bal' WHERE id = '$t_account'";
        if(!$dbconnect -> query($query)){
            echo "<div class='change-message error'>Error: " . $dbconnect -> error . "</div>";
        }
        else{
            echo "<div class='change-message success'>Transaction added successfully</div>";
        }
        #header("Location: transactions.php");
    }
    if(isset($_POST['add_account'])){
        echo "Adding account";
        $a_name = $_POST['name'];
        $a_amount = $_POST['amount'];
        $a_user = fetch_user_id($_SESSION['username']);
        $query = "INSERT INTO accounts (`name`, `balance`, `user`) VALUES ('$a_name', '$a_amount', '$a_user')";
        $dbconnect -> query($query);
        header("Location: accounts.php");
    }
?>