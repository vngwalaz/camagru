<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--<link rel="stylesheet" href="../css/reset.css">-->
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/main.css">
        <title>Login</title>
    </head>
    <body class="main-wrap">
        <header>
            <h1>Welcome back</h1><hr color="white">
        </header>
        <section>
            <center>
                <div class="imput-form">
                    <?php include '../src/login.src.php'; ?>
                    <?php if(isset($output)) echo $output; ?>
                    <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
                    <form action="" method="post">
                        <table>
                            <p>SignUp</p>
                            <tr> <td><input type="text" placeholder="username or email" name+"username"></td> </tr>
                            <tr> <td><input type="text" placeholder="password" name="pasword"></td> </tr>
                            <tr> <td><button type="submit" value="Signin" name="LoginBtn">Login</button> <a style="float: right;" href="forgotpwd.php">forgot password?</a></td> </tr>
                        </table>
                    </form>
                    <p class="text"><a href="../index.php" color="red">BACK</a></p>
                </div>
            </center>
        </section>
    </body>
</html>