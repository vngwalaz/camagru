<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <?php include_once '../src/accountDetails.src.php'; ?>
        <?php if(isset($output)) echo $output; ?>
        <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
        <table>
            <p>change your login details</p>
            <tr> <td><input type="text" placeholder="newemail" name="new email"></td> </tr>
            <tr> <td><input type="text" placeholder="newpw" name="new password"></td> </tr>
            <tr> <td><input type="text" placeholder="oldpw" name="confirm old password"></td> </tr>
            <tr> <td><button type="submit" value="Confirm" name="submit">Save</button> </td> </tr>
        </table>
    </form>
</body>
</html>

<!--form action='index.php?page=account' method='post'>

<input type='text' name='newemail' placeholder='Change email?' /><br />
<input type='text' name='newpw' placeholder='Change password?' />
<p><input type='text' name='oldpw' placeholder='Old password to confirm' /></p>
<input type='submit' name='submit' value='Confirm' />

</form>-->