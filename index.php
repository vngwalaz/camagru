<!DOCTYPE html>
<?php include_once 'resources/session.php'; ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--<link rel="stylesheet" href="../css/reset.css">-->
        <link rel="stylesheet" href="css/main.css">
        <title>HOME</title>
    </head>
    <body class="main-wrap">
        <header>
            <h1>welcome to camagru</h1><hr color="white">
        </header>

        <section>
            <div class="welcome-div">
                <center>
                    <?php if(!isset($_SESSION['username'])): ?>
                    <p class="text">Welcome to camagru if you would like to <a href="pages/login.php">Login</a>.</p>
                    <p class="text">But if you are not a member yet you can <a href="pages/signup.php">Signup</a>.</p>
                    <p class="text">       Enjoy you time with us!!!</p>
                    <?php  else: ?>
                    <p class="text">Welcome back <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> you can logout <a href="pages/logout.php">logout</a></p>
                    <?php endif ?>
                </center>
            </div>
        </section>
    </body>
</html>