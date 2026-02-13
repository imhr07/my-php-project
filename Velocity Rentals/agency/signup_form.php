<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$errors = [
    "agencyUsername_err" => "",
    "agencyPassword_err" => "",
    "agencyEmail_err" => "",
    "agencyName_err" => "",
    "agencyAddress_err" => "",
    "agencyMobile_err" => ""
];

foreach ($errors as $key => $value) {
    if (isset($_SESSION[$key])) {
        $errors[$key] = $_SESSION[$key];
        unset($_SESSION[$key]);
    }
}

$prefilled_values = [
    "agencyUsername" => "",
    "agencyEmail" => "",
    "agencyName" => "",
    "agencyAddress" => "",
    "agencyMobile" => ""
];

foreach ($prefilled_values as $key => $value) {
    if (isset($_SESSION[$key . "_value"])) {
        $prefilled_values[$key] = $_SESSION[$key . "_value"];
        unset($_SESSION[$key . "_value"]);
    }
}
?>

<style>
.agency-card {
    max-width: 500px;
    margin: auto;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    background: #ffffff;
}

.form-control {
    border-radius: 30px;
    padding-left: 45px;
}

.input-icon {
    position: absolute;
    left: 15px;
    top: 10px;
    color: #007bff;
}

.form-group {
    position: relative;
    margin-bottom: 20px;
}

.signup-btn {
    background: linear-gradient(135deg,#0066ff,#00c6ff);
    border: none;
    border-radius: 30px;
    padding: 12px;
    color: white;
    font-weight: 600;
    width: 100%;
    transition: 0.3s;
}

.signup-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,102,255,0.4);
}
</style>

<div class="agency-card">
<h4 class="text-center mb-4"><i class="fas fa-building"></i> Agency Sign Up</h4>

<form action="agency/signup.php" method="POST">

    <div class="form-group">
        <i class="fas fa-user input-icon"></i>
        <input type="text" name="agencyUsername" class="form-control"
               placeholder="Username"
               value="<?php echo $prefilled_values['agencyUsername']; ?>">
        <small class="text-danger"><?php echo $errors["agencyUsername_err"]; ?></small>
    </div>

    <div class="form-group">
        <i class="fas fa-lock input-icon"></i>
        <input type="password" name="agencyPassword" class="form-control"
               placeholder="Password">
        <small class="text-danger"><?php echo $errors["agencyPassword_err"]; ?></small>
    </div>

    <div class="form-group">
        <i class="fas fa-envelope input-icon"></i>
        <input type="email" name="agencyEmail" class="form-control"
               placeholder="Email"
               value="<?php echo $prefilled_values['agencyEmail']; ?>">
        <small class="text-danger"><?php echo $errors["agencyEmail_err"]; ?></small>
    </div>

    <div class="form-group">
        <i class="fas fa-user-tie input-icon"></i>
        <input type="text" name="agencyName" class="form-control"
               placeholder="Agency Name"
               value="<?php echo $prefilled_values['agencyName']; ?>">
        <small class="text-danger"><?php echo $errors["agencyName_err"]; ?></small>
    </div>

    <div class="form-group">
        <i class="fas fa-map-marker-alt input-icon"></i>
        <textarea name="agencyAddress" class="form-control"
                  placeholder="Office Address"><?php echo $prefilled_values['agencyAddress']; ?></textarea>
        <small class="text-danger"><?php echo $errors["agencyAddress_err"]; ?></small>
    </div>

    <div class="form-group">
        <i class="fas fa-phone input-icon"></i>
        <input type="text" name="agencyMobile" class="form-control"
               placeholder="Mobile Number"
               value="<?php echo $prefilled_values['agencyMobile']; ?>">
        <small class="text-danger"><?php echo $errors["agencyMobile_err"]; ?></small>
    </div>

    <button type="submit" class="signup-btn">
        <i class="fas fa-user-plus"></i> Create Agency Account
    </button>

</form>
</div>
