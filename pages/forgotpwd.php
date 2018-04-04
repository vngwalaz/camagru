<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--<link rel="stylesheet" href="../css/reset.css">-->
        <link rel="stylesheet" href="../css/forgotpwd.css">
        <link rel="stylesheet" href="../css/main.css">
        <title>Forgot Password</title>
    </head>
    <body class="main-wrap">
        <header>
            <h1>Forgot your password?</h1><hr color="white">
        </header>
        <section>
            <center>
                <div class="imput-form">
                    <form action="" method="post">
                        <?php include_once '../src/forgotpwd.src.php'; ?>
                        <?php if(isset($output)) echo $output; ?>
                        <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
                        <table>
                            <p>Reset Password</p>
                            <tr> <td><input type="text" placeholder="email" name="email"></td> </tr>
                            <tr> <td><input type="password" placeholder="New Password" name="new_password"></td> </tr>
                            <tr> <td><input type="password" placeholder="Confirm Password" name="confrm_password"></td> </tr>
                            <tr> <td><button type="submit" name="resetPwdBtn" value="Reset Password">Signup</button> </td> </tr>
                        </table>
                    </form>
                        <p class="text"><a href="../index.php" color="red">BACK</a></p>
                </div>
            </center>
        </section>
    </body>
</html>