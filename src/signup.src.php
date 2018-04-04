<?php
    include_once '../database/connect.php';
    include_once '../resources/session.php';
    include_once '../resources/utilities.php';

    if(isset($_POST['signupBtn'])) {
        //intialize array to store any error from the form
        $form_errors = array();
        //form validation
        $required_fields = array('firstname', 'lastname', 'email', 'username', 'password');
        //call function to check for empty fields
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
        //checkng fields for the minum letters required
        $fields_to_check_length = array('username' => 4, 'password' => 6);
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));
        $form_errors = array_merge($form_errors, check_email($_POST));

        $firstname = ucfirst($_POST['firstname']);
        $lastname = ucfirst($_POST['lastname']);
        $email = strtolower($_POST['email']);
        $username = ucwords($_POST['username']);
        $password = $_POST['password'];
        $token = uniqid(rand(), true);
        $active = 0;

        if (checkDuplicateEntries("users", "email", $username, $db)){
            $output = flashMessage("Email already taken, try new email");
        } elseif (checkDuplicateEntries("users", "username", $username, $db)){
            $output = flashMessage("Username already taken, try new username");
        } 
        elseif(empty($form_errors)){
    
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);      
            try {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sqlInsert = $db->prepare("INSERT INTO (firstname, lastname, email, username, password, token, actve)
                VALUES (:firstname, :lastname, :email, :username, :password, :token, :active)");
    
                //$statement = $db->prepare($sqlInsert);
                $sqlInsert->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $sqlInsert->bindParam(':lastname',  $lastname, PDO::PARAM_STR);
                $sqlInsert->bindParam(':email', $email, PDO::PARAM_STR);
                $sqlInsert->bindParam(':username', $username, PDO::PARAM_STR);
                $sqlInsert->bindParam(':password', $hashedPwd, PDO::PARAM_STR);
                $sqlInsert->bindParam(':token', $token, PDO::PARAM_STR);
                $sqlInsert->bindParam(':active', $active, PDO::PARAM_STR);
                //$sqlInsert->execute(array(':firstname'== $firstname, ':lastname'==$lastname, ':email'==$email, ':username'==$username, ':password'==$hashedPwd, ':token'==$token, ':active' ==$active));
                $sqlInsert = $db->execute(array(':firstname'=>$firstname, ':lastname'=>$lastname, ':email'=>$email, ':username'=>$username, ':password'=>$hashedPwd, ':token'=>$token, ':active' =>$active));
                email_rerify($email, $firstname, $lastname, $token, $username);
                if ($sqlInsert->rowCount() > 1) {
                    $output = flashMessage("Registration Successful", "Pass");
                }
            } catch (PDOExcepton $sex){
                $output = flashMessage("Registration failed: " .$ex->getMessage());
            }
        } else {
            if (count($form_errors) == 1) {
                $output = flashMessage("there was 1 errors in the form <br>");
            }else {
                $output = flashMessage("there were ".count($form_errors)." errors in the form <br>");
            }
        }
    }
?>