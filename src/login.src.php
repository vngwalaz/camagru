<?php
    include_once '../database/connect.php';
    include_once '../resources/session.php';
    include_once '../resources/utilities.php';
    //include_once '../pages/login.php';

    if (isset($_POST['LoginBtn'])){
        $form_errors = array();
        $required_flelds = array('username', 'password');
        $form_errors = array_merge($form_errors, check_empty_fields($required_flelds));

        if (empty($form_errors)){
            //collect data from user input
            $user = $_POST['username'];
            $password = $_POST['password'];

            //check if the user entered correct cridentials
            $query = "SELECT * FROM users WHERE username = :username";
            $statement = $db->prepare($query);
            $statement->execute(array(':username' => $user));

            while ($row = $statement->fetch()){
                $id = $row['id'];
                $hashed_pwd = $row['password'];
                $username = $row['username'];

                if (password_verify($password, $hashed_pwd)) {
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    redirectTo('profile2');
                }else{ 
                    $output = flashMessage("Invelid username or password");
                }
            }
        } else {
            if (count($form_errors) === 1) {
                $output = flashMessage("there is an error in the form");
            } else {
                $output = flashMessage("there were ".count($form_errors)." an error in the form");
            }
        }
    }
?>