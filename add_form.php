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
    <div class="flex-row-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <h1><object data="svg/Financial_Document.svg" height="50rem"></object>FinSek</h1>
            </div>
            <div class="sidebar-body">
                <h2><object data="svg/Certificate.svg" height="45rem"></object><a href="dashboard.php">Pagrindinis</a></h2>
                <h2><object data="svg/Cash.svg" height="45rem"></object><a href="transactions.php">Pavedimai</a></h2>
                <h2><object data="svg/Credit_Card.svg" height="45rem"></object><a href="accounts.php">Sąskaitos</a></h2>
                <h2><object data="svg/Money_Bag.svg" height="45rem"></object><a href="borrows.php">Paskolinimai</a></h2>
                <h2><object data="svg/Currency.svg" height="45rem"></object><a href="lends.php">Pasiskolinimai</a></h2>
                <h2><a href="logout.php">Log out</a></h2>
            </div>
        </div>
        <div class="main">
            <div class="card change-form">
                <form action="add_db_item.php" method="POST">
                    <fieldset>
                        <input required type="text" name="name" placeholder="Name">
                        <?php
                            $categories = ['Entertainment', 'Food', 'Transportation', 'Bills', 'Other'];
                            if(isset($_POST['transaction'])){
                                echo "<select required name='category'>";
                                foreach($categories as $category){
                                    echo "<option value='$category'>$category</option>";
                                }
                                echo "</select>";
                                echo "<input required type='date' name='date'>";
                                echo "<input required type='number' name='amount' step='0.01' placeholder='Amount'>";
                                echo "<input type='hidden' name='add-transaction'>";
                            }
                            if(isset($_POST['account'])){
                                echo "<input required type='number' name='amount' step='0.01' placeholder='Balance'>";
                                echo "<input type='hidden' name='add-account'>";
                            }
                            if(isset($_POST['lend'])){
                                echo "<input required type='text' name='person' placeholder='Person'>";
                                echo "<input required type='date' name='date'>";
                                echo "<input required type='number' name='amount' step='0.01' placeholder='Amount'>";
                                echo "<input type='hidden' name='add-lend'>";
                            }
                            if(isset($_POST['borrow'])){
                                echo "<input required type='text' name='person' placeholder='Person'>";
                                echo "<input required type='date' name='date'>";
                                echo "<input required type='number' name='amount' step='0.01' placeholder='Amount'>";
                                echo "<input type='hidden' name='add-borrow'>";
                            }
                        ?>
                        <input type='submit' name='submit' value='Pridėti'>
                    </fieldset>                
                </form>
            </div>
        </div>
    </div>
</body>
</html>