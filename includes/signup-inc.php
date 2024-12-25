<?php

if ($_SERVER ["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try{

        require_once "dbh-inc.php";
        require_once "signup-control.php";
        require_once "signup-module.php";
        require_once "signup-view.php";

        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

       if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }

        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
         }

         if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
          }
          
          if (empty($errors)) {
            echo "Signup successful!";
        }



          require_once "configsession.php";

          if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            header("Location: signup.php?error");

            $signupData = [
              "username" => $username, 
              "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../signup.php?error");
            die();
          }

          create_user($pdo, $username, $pwd, $email);

          header ("Location: ../index.php?signupsuccess");

          
          $pdo = null;
          $stmt = null;

          
          die();
        
        } catch (PDOException $e) {
            die ("Query failed: "  . $e->getmessage());
        }
      }

      else {
        header ("Location: ../index.php");
        die();
      }
