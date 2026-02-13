<?php
session_start();
require_once "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["agencyUsername"]);
    $password = trim($_POST["agencyPassword"]);
    $email    = trim($_POST["agencyEmail"]);
    $name     = trim($_POST["agencyName"]);
    $address  = trim($_POST["agencyAddress"]);
    $mobile   = trim($_POST["agencyMobile"]);

    $_SESSION["agencyUsername_value"] = $username;
    $_SESSION["agencyEmail_value"]    = $email;
    $_SESSION["agencyName_value"]     = $name;
    $_SESSION["agencyAddress_value"]  = $address;
    $_SESSION["agencyMobile_value"]   = $mobile;

    // Username Check
    $stmt = $conn->prepare("SELECT agency_id FROM agencies WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION["agencyUsername_err"] = "Username already taken";
        header("location: ../signup.php?tab=agency");
        exit();
    }
    $stmt->close();

    // Insert
    $stmt = $conn->prepare("INSERT INTO agencies (username,password,email,name,address,mobile)
                            VALUES (?,?,?,?,?,?)");

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt->bind_param("ssssss",
        $username,
        $hashedPassword,
        $email,
        $name,
        $address,
        $mobile
    );

    if ($stmt->execute()) {

        session_unset();
        $_SESSION["success_message"] = "Agency account created successfully!";
        header("location: ../signin.php?tab=agency");
        exit();

    } else {
        $_SESSION["err_message"] = "Something went wrong!";
        header("location: ../signup.php?tab=agency");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
