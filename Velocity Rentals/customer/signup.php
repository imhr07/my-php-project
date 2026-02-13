<?php
session_start();
require_once "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["customerUsername"]);
    $password = trim($_POST["customerPassword"]);
    $email = trim($_POST["customerEmail"]);
    $name = trim($_POST["customerName"]);
    $mobile = trim($_POST["customerMobile"]);

    $username_err = $password_err = $email_err = $name_err = $mobile_err = "";

    // Store values for repopulating
    $_SESSION["customerUsername_value"] = $username;
    $_SESSION["customerEmail_value"] = $email;
    $_SESSION["customerName_value"] = $name;
    $_SESSION["customerMobile_value"] = $mobile;

    // Username check
    if (empty($username)) {
        $username_err = "Please enter username";
    } else {
        $sql = "SELECT customer_id FROM customers WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $username_err = "Username already taken";
        }
        $stmt->close();
    }

    // Password check
    if (empty($password)) {
        $password_err = "Please enter password";
    } elseif (strlen($password) < 6) {
        $password_err = "Minimum 6 characters required";
    }

    // Email check
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    }

    // Name check
    if (empty($name)) {
        $name_err = "Enter your name";
    }

    // Mobile check
    if (!preg_match('/^[0-9]{10}$/', $mobile)) {
        $mobile_err = "Enter valid 10 digit number";
    }

    if (empty($username_err) && empty($password_err) &&
        empty($email_err) && empty($name_err) && empty($mobile_err)) {

        $sql = "INSERT INTO customers (username,password,email,name,mobile)
                VALUES (?,?,?,?,?)";

        $stmt = $conn->prepare($sql);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sssss",
            $username, $hashed_password, $email, $name, $mobile);

        if ($stmt->execute()) {
            session_unset();
            $_SESSION["success_message"] = "Signup successful!";
            header("Location: ../signin.php");
            exit();
        }

        $stmt->close();
    } else {

        $_SESSION["customerUsername_err"] = $username_err;
        $_SESSION["customerPassword_err"] = $password_err;
        $_SESSION["customerEmail_err"] = $email_err;
        $_SESSION["customerName_err"] = $name_err;
        $_SESSION["customerMobile_err"] = $mobile_err;

        header("Location: ../signup.php");
        exit();
    }

    $conn->close();
}
?>
