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
        if(!$_SESSION['authenticated']){
            header("Location: login.php");
        }
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
            <div class="card change-form">
                <form action="add_db_item.php" method="POST">
                    <fieldset>
                        <input required type="text" name="name" placeholder="Pavadinimas">
                        <?php
                            include 'functions.php';
                            $categories = ['Pramogos', 'Maistas', 'Transportas', 'Sąskaitos', 'Kita'];
                            $accounts = fetch_accounts($_SESSION['username']);
                            if(isset($_POST['transaction'])){
                                echo "<select required name='category'>";
                                foreach($categories as $category){
                                    echo "<option value='$category'>$category</option>";
                                }
                                echo "</select>";
                                echo "<input required type='date' name='date'>";
                                echo "<input required type='number' name='amount' step='0.01' placeholder='Suma'>";
                                echo "<select required name='account'>";
                                foreach($accounts as $account){
                                    echo "<option value='$account'>$account</option>";
                                }
                                echo "</select>";
                                echo "<input type='hidden' name='add_transaction'>";
                            }
                            if(isset($_POST['account'])){
                                echo "<input required type='number' name='amount' step='0.01' placeholder='Likutis'>";
                                echo "<input type='hidden' name='add_account'>";
                            }
                            if(isset($_POST['lend'])){
                                echo "<input required type='text' name='person' placeholder='Person'>";
                                echo "<input required type='date' name='date'>";
                                echo "<select required name='account'>";
                                foreach($accounts as $account){
                                    echo "<option value='$account'>$account</option>";
                                }
                                echo "</select>";
                                echo "<input required type='number' name='amount' step='0.01' placeholder='Suma'>";
                                echo "<input type='hidden' name='add_l'>";
                            }
                            if(isset($_POST['borrow'])){
                                echo "<input required type='text' name='person' placeholder='Person'>";
                                echo "<input required type='date' name='date'>";
                                echo "<select required name='account'>";
                                foreach($accounts as $account){
                                    echo "<option value='$account'>$account</option>";
                                }
                                echo "</select>";
                                echo "<input required type='number' name='amount' step='0.01' placeholder='Suma'>";
                                echo "<input type='hidden' name='add_b'>";
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