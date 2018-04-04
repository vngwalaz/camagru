<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--<link rel="stylesheet" href="../css/reset.css">-->
        <link rel="stylesheet" href="../css/signup.css">
        <link rel="stylesheet" href="../css/main.css">
        <title>Signup</title>
    </head>
    <body class="main-wrap">
        <header>
            <h1>signup and join others</h1><hr color="white">
        </header>
        <section>
            <center>
                <div class="imput-form">
                    <form action="" method="post">
                        <?php include_once '../src/signup.src.php'; ?>
                        <?php if(isset($output)) echo $output; ?>
                        <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
                        <table>
                            <p>SignUp</p>
                            <tr> <td><input type="text" placeholder="Firstname" name="firstname"></td> </tr>
                            <tr> <td><input type="text" placeholder="Lastname" name="lastname"></td> </tr>
                            <tr> <td><input type="text" placeholder="email" name="email"></td> </tr>
                            <tr> <td><input type="text" placeholder="username" name="username"></td> </tr>
                            <tr> <td><input type="password" placeholder="password" name="password"></td> </tr>
                            <tr> <td><button type="submit" value="signupBtn" name="signupBtn">Signup</button> </td> </tr>
                        </table>
                    </form>
                    <p class="text"><a href="../index.php" color="red">BACK</a></p>
                </div>
            </center>
        </section>
    </body>
</html>