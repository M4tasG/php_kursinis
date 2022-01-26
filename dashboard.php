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
                <h2><a href="logout.php.php">Atsijungti</a></h2>
            </div>
        </div>
        <div class="main">
            <div class="main-row">
                <div class="card linechart">
                    <h2>Linegraph</h2>
                    <canvas id="line_chart" width="1500px" height="450px"></canvas>
                </div>    
            </div>
            <div class="main-row">
                <div class="card txtstats">
                    <h2>Statistics</h2>
                    <div class="txtstats-wrapper">
                        <div class="stat">
                            <h2>Change this month:</h2>
                            <h2><span class="stats-highlight">+0.00</span></h2>
                        </div>
                        <div class="stat">
                            <h2>Gained:</h2>
                            <h2><span class="stats-highlight">+0.00</span></h2>
                        </div>
                        <div class="stat">
                            <h2>Spent:</h2>
                            <h2><span class="stats-highlight">-0.00</span></h2>
                        </div>
                        <div class="stat">
                            <h2>Category mostly spent on:</h2>
                            <h2><span class="stats-highlight">Utility</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Importing Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Importing my own js script for generating the charts using Chart.js -->
    <script src="js/line_chart.js"></script>
</body>
</html>