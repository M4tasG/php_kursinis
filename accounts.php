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
            </div>
        </div>
        <div class="main">
            <div class="card list">
                <div class="list-top">
                    <a href="#" class="btn-alternate">Pridėti</a>
                    <a href="#" class="btn-alternate">Ištrinti</a>
                </div>
                <div class="list-body">
                    <div class="list-item">
                        <p class="list-item-name">Account name</p>
                        <p class="list-item-amount">0.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>