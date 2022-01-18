<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>FinSek - Registracija</title>
</head>
<body>
    <div class="flex-col-container">
        <div class="splash-header">
            <h1><object data="svg/Financial_Document.svg" height="50rem"></object>FinSek</h1>
        </div>
        <div class="form-container">
            <h1>Registracija</h1>
            <form method="POST">
                <fieldset>
                    <input placeholder="Vartotojo vardas" type="text" name="username" id="username" required>
                    <input placeholder="Elektroninis paštas" type="text" name="email" id="email" required>
                    <input placeholder="Slaptažodis" type="password" name="password" id="password" required>
                    <button type="submit" class="btn txt-white">Registruotis</button>
                </fieldset>
                Jau turite paskyrą? <a href="login.php" class="txt-accent">Prisijungti</a>
            </form>
        </div>
    </div>
</body>
</html>