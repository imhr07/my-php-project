<?php
// session_start();

// Error messages
$errors = [
    "customerUsername_err" => "",
    "customerPassword_err" => "",
    "customerEmail_err" => "",
    "customerName_err" => "",
    "customerMobile_err" => ""
];

// Pre-filled values
$prefilled_values = [
    "customerUsername" => "",
    "customerEmail" => "",
    "customerName" => "",
    "customerMobile" => ""
];

foreach ($errors as $key => $value) {
    if (isset($_SESSION[$key])) {
        $errors[$key] = $_SESSION[$key];
        unset($_SESSION[$key]);
    }
}

foreach ($prefilled_values as $key => $value) {
    if (isset($_SESSION[$key . "_value"])) {
        $prefilled_values[$key] = $_SESSION[$key . "_value"];
        unset($_SESSION[$key . "_value"]);
    }
}
?>

<style>
.signup-card {
    max-width: 450px;
    margin: 40px auto;
    padding: 30px;
    border-radius: 15px;
    background: #ffffff;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
}

.signup-card h4 {
    font-weight: 600;
    margin-bottom: 25px;
}

.form-control {
    border-radius: 30px;
    padding-left: 20px;
}

.signup-btn {
    width: 100%;
    border-radius: 30px;
    padding: 12px;
    font-weight: 600;
    background: linear-gradient(135deg,#0066ff,#00c6ff);
    border: none;
    color: white;
    transition: 0.3s;
}

.signup-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,102,255,0.4);
}
</style>

<div class="signup-card">
<h4><i class="fas fa-user"></i> Customer Sign Up</h4>

<form action="customer/signup.php" method="POST">

    <div class="form-group">
        <input type="text" class="form-control" name="customerUsername"
        placeholder="Username"
        value="<?php echo $prefilled_values['customerUsername']; ?>">
        <small class="text-danger"><?php echo $errors["customerUsername_err"]; ?></small>
    </div>

    <div class="form-group">
        <input type="password" class="form-control"
        name="customerPassword" placeholder="Password">
        <small class="text-danger"><?php echo $errors["customerPassword_err"]; ?></small>
    </div>

    <div class="form-group">
        <input type="email" class="form-control"
        name="customerEmail" placeholder="Email"
        value="<?php echo $prefilled_values['customerEmail']; ?>">
        <small class="text-danger"><?php echo $errors["customerEmail_err"]; ?></small>
    </div>

    <div class="form-group">
        <input type="text" class="form-control"
        name="customerName" placeholder="Full Name"
        value="<?php echo $prefilled_values['customerName']; ?>">
        <small class="text-danger"><?php echo $errors["customerName_err"]; ?></small>
    </div>

    <div class="form-group">
        <input type="text" class="form-control"
        name="customerMobile" placeholder="Mobile Number"
        value="<?php echo $prefilled_values['customerMobile']; ?>">
        <small class="text-danger"><?php echo $errors["customerMobile_err"]; ?></small>
    </div>

    <button type="submit" class="signup-btn">Create Account</button>

</form>
</div>
