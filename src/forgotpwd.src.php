<?php 
    include_once '../database/connect.php';
    include_once '../resources/session.php';
    include_once '../resources/utilities.php';

    if(isset($_POST['resetPwdBtn'])){
        $form_errors = array();
        $required_fields = array('email', 'new_password', 'confrm_password');
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
        $fields_to_check_length = array('new_password' => 6, 'confrm_password' => 6);
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));
        $form_errors = array_merge($form_errors, check_email($_POST));

        if(empty($form_errors)){
            $email = $_POST['email'];
            $password1 = $_POST['new_password'];
            $password2 = $_POST['confrm_password'];

            if ($password1 != $password2){
                $output = flashMessage("passwords do not match");
            } else {
                try {
                    $sqlQuery = "SELECT email FROM users WHERE email=:email";
                    $statement = $db->prepare($sqlQuery);
                    $statement->excecute(array(':email' => $email));

                    if($statment->rowCount() == 1){
                        $hashed_pwd = password_hash($password1, PASSWORD_DEFAULT);

                        $sqlUpdate = "UPDATE users SET password=:password WHERE email=:email";
                        $statement = $db->prepare($sqlUpdate);
                        $statement->excecute(array(':password' => $hashed_pwd, ':email' => $email));

                        $output = flashMessage("Password reset Success", "Pass");
                    } 
                    else {
                        $output = flashMessage("the email provided does not exist in our database");
                    }
                } catch (PDOException $ex) {
                    $output = flashMessage("an error occurred".$ex->getMessage()."!!");
                }
            }
        }
        else {
            if (count($form_errors) == 1) {
                $output = flashMessage("the was 1 error in the form");
            } else {
                $output = flashMessage("there were".count($form_errors)." errors in the form");
            }
        }
    }
?>