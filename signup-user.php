<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#password").on("input", function(){
            var password = $(this).val();
            var criteria = "";
            var strength = 0;

            if (!password.match(/([a-z])/)) {
                criteria += "<li>Must include a lowercase letter</li>";
            } else {
                strength += 1;
            }
            if (!password.match(/([A-Z])/)) {
                criteria += "<li>Must include an uppercase letter</li>";
            } else {
                strength += 1;
            }
            if (!password.match(/([0-9])/)) {
                criteria += "<li>Must include a number</li>";
            } else {
                strength += 1;
            }
            if (!password.match(/([!@#$%^&*()])/)) {
                criteria += "<li>Must include a symbol</li>";
            } else {
                strength += 1;
            }
            if (password.length < 8) {
                criteria += "<li>Must be at least 8 characters</li>";
            } else {
                strength += 1;
            }

            $("#password_criteria").html(criteria);

            if (strength === 0) {
                $("#password_strength").html("");
            } else if (strength <= 2) {
                $("#password_strength").html("Weak");
                $("#password_strength").css("color", "red");
            } else if (strength <= 4) {
                $("#password_strength").html("Moderate");
                $("#password_strength").css("color", "orange");
            } else if (strength === 5) {
                $("#password_strength").html("Strong");
                $("#password_strength").css("color", "green");
            }
        });
    });
</script>


	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <?php

   
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <form action="sign-user.php" method="POST">
                        <h2 class="text-center">Signup Form</h2>
                        <p class="text-center">Fill up the form</p>
                        <?php
                        if(count($errors) == 1){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach($errors as $showerror){
                                    echo $showerror;
                                }
                                ?>
                            </div>
                            <?php
                        }elseif(count($errors) > 1){
                            ?>
                            <div class="alert alert-danger">
                                <?php
                                foreach($errors as $showerror){
                                    ?>
                                    <li><?php echo $showerror; ?></li>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                            <span id="password_strength"></span><br>
                            <ul id="password_criteria"></ul>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                        <div class="form-group">
                            <label for="UserType">User Type:</label>
                            <select class="form-control" name="usertype" id="usertype" required>
                            <option value="Administrator">Administrator</option>
                             <option value="Subscriber">Subscriber</option>
                     </div>
                       
                            <input class="form-control button" type="submit" name="signup" value="Signup">
                        </div>
                        <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</body>
</html>