<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Hospital automation</title>
</head>

<body>
    <h1>HOSPITAL AUTOMATION</h1>
    <div class="container">
        <h2>USER LOGIN</h2>
        <form action="" method="POST">
            <div class="id_num">
                <input type="text" name='id_num' placeholder="Identity Number" pattern="\d{11}" required>
            </div>
            <div class="password">
                <input type="password" name='password' placeholder="Password" pattern=".{8,}" required>
            </div>
            <button type="submit" name="login" class="login">LOGIN</button>
        </form>
        <p>If you haven't registered, Sign up from <a href="sign_up.php">here</a></p>
    </div>
</body>

</html>