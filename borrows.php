<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>FinSek - Pagrindinis</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <div class="flex-row-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <h1><object data="svg/Financial_Document.svg" height="50rem"></object>FinSek</h1>
            </div>
            <div class="sidebar-body">
            <h2><?php echo "Sveiki, " . $_SESSION['username']; ?></h2>
                <h2><object data="svg/Certificate.svg" height="45rem"></object><a href="dashboard.php">Pagrindinis</a></h2>
                <h2><object data="svg/Cash.svg" height="45rem"></object><a href="transactions.php">Pavedimai</a></h2>
                <h2><object data="svg/Credit_Card.svg" height="45rem"></object><a href="accounts.php">Sąskaitos</a></h2>
                <h2><object data="svg/Money_Bag.svg" height="45rem"></object><a href="lends.php">Paskolinimai</a></h2>
                <h2><object data="svg/Currency.svg" height="45rem"></object><a href="borrows.php">Pasiskolinimai</a></h2>
                <h2><a href="logout.php">Atsijungti</a></h2>
            </div>
        </div>
        <div class="main">
            <div class="card list">
                <div class="list-top">
                    <form method="POST" action="add_form.php">
                        <button class="btn-alternate" name="borrow">Pridėti</button>
                    </form>
                    <form method="POST" action="delete_form.php">
                        <button class="btn-alternate" name="borrow">Ištrinti</button>
                    </form>
                </div>
                <?php
                    include 'db.php';
                    include 'functions.php';
                    $user_id = fetch_user_id($_SESSION['username']);
                    $query = "SELECT * FROM borrows WHERE user = '$user_id'";
                    $result = $dbconnect->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<div class='list-body'>";
                        echo "<div class='list-item'>";
                        echo "<p class='list-item-name'>".$row['name']."</p>";
                        echo "<p class='list-item-category'>".$row['person']."</p>";
                        echo "<p class='list-item-date'>".$row['date']."</p>";
                        echo "<p class='list-item-amount'>".$row['amount']."</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>