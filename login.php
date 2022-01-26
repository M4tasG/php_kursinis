<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>FinSek - Prisijungimas</title>
</head>
<body>
    <div class="flex-col-container txt-center">
        <div class="splash-header">
            <h1><object data="svg/Financial_Document.svg" height="50rem"></object>FinSek</h1>
        </div>
        <div class="form-container">
            <h1>Prisijungimas</h1>
            <form action="login_check.php" method="POST">
                <fieldset>
                    <input placeholder="Vartotojo vardas" type="text" name="username" required>
                    <input placeholder="Slaptažodis" type="password" name="password" required>
                    <button type="submit" name="submit" class="btn txt-white">Prisijungti</button>
                </fieldset>
                Neturite paskyros? <a href="register.php" class="txt-accent">Registruotis</a>
            </form>
        </div>
    </div>
</body>
</html>