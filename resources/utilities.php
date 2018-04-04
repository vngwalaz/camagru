<?php
    include_once '../database/dbh.php';
    function check_empty_fields($required_fields_array) {
        $form_errors = array();

        foreach ($required_fields_array as $name_of_field) {
            if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL) {
                $form_errors[] = $name_of_field . " is required field";
            }
        }
        return $form_errors;
    }

    function check_min_length($fields_to_check_length) {
        //an aarray to store all the error massages
        $form_errors = array();
        
        foreach($fields_to_check_length as $name_of_field => $minimum_lenght_required) {
            if (strlen(trim($_POST[$name_of_field])) < $minimum_lenght_required) {
                $form_errors[] = $name_of_field . " is to short must be alteast {$minimum_lenght_required} charecters long";
            }
        }
        return $form_errors;
    }

    function check_email($data) {
        //an aarray to store all the error massages
        $form_errors = array();
        $key = 'email';
        //check if email exists in data array 
        if (array_key_exists($key, $data)) {
            //check if email field has valid value
            if ($_POST[$key] != null) {
                //remove all illigal charectores from email
                $key = filter_var($key, FILTER_SANITIZE_EMAIL);
                //checking if email valid
                if (filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false) {
                    $form_errors[] = $key . " not a valid email address";
                }
            }
        }
        return $form_errors;
    }

    function show_errors($form_errors_array) {
        $errors = "<p><ul style='color: red;'>";

        //looping through the array and displayn gall the items in a list
        foreach ($form_errors_array as $the_error) {
            $errors .= "<li> {$the_error} </li>";
        }
        $errors .= "</ul></p>";
        return $errors;
    }

    function flashMessage($message, $passOrFail = "fail"){
        if ($passOrFail === "Pass"){
            $data = "<p style='padding:20px; color:green; border:1px solid grey;'>{$message}</p>";
        }else{
            $data =  "<p style='padding:20px; color:red; border:1px solid grey;'>{$message}</p>";
        }
        return ($data);
    }

    function redirectTo($page){
        header("Location: {$page}.php");
    }

    function checkDuplicateEntries($table, $columb_name, $value, $db) {
        try {
            $sqlQuery = "SELECT * FROM" .$table." WHERE" .$columb_name."=:$columb_name";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':$columb_name' => $value));

            if($row = $statement->fetch()){
                return true;
            }
            return false;
        }catch(PDOException $sex) {

        }
    }

    function email($email, $firstname, $lastname, $token, $username){
        //email system
    $_SESSION['active'] = 0; //0 until user activates their account with verify.php
    $_SESSION['logged_in'] = true; // So we know the user has logged in
    $_SESSION['message'] = "Confirmation link has been sent to $email, please verify
                        your account by clicking on the link in the message!";
    // Send registration confirmation link (verify.php)
    $sendto       = $email;
    $subject      = 'Account Verification (camagru.com)';
    $message_body = 'Hello '.$firstname.' '.$lastname.',

                    username:'.$username.'
                    Thank you for signing up!
                    Please click this link to activate your account:
                    http://localhost:8080/cam/camagru/includes/verifyEmail.php?email='.$email.'&token='.$token;
 mail($sendto, $subject, $message_body );
    }
?>