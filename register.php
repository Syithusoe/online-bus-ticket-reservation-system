<?php include('server.php') ?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <title> Register </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="SignupTest1.css">
    <script src="SignupTest.js"></script>
</head>
<body>
<div class="box">
    <h2>Register</h2>
    <form class="material form" method="post" action="register.php">
        <?php include('error.php'); ?>
        <!------------------- username Field---------->
        <div class="form-group">
            <input type="text" name="username" class="form-control" required value="<?php echo $username; ?>">
            <label>Username</label>
            <span class="input-border"></span>
        </div>
        <!-------------------email field-------------->
        <div class="form-group">
            <input type="email" name="email" class="form-control" required value="<?php echo $email; ?>">
            <label>Email</label>
            <span class="input-border"></span>
        </div>
        <!------------------ phone number------------->

        <div class="form-group">
            <input type="tel" name="tel" class="form-control" required value="<?php echo $tel; ?>">
            <label>Phone Number</label>
            <span class="input-border"></span>
        </div>

        <!------------------Password field------------>
        <div class="form-group">
            <input type="password" name="password_1" class="form-control" required minlength="6">
            <label>Password</label>
            <span class="input-border">
				</span>
        </div>

        <div class="form-group">
            <input type="password" name="password_2" class="form-control" required minlength="6">
            <label>Confirm Password</label>
            <span class="input-border">
				</span>
        </div>

        <button type="submit" name="register_user" class="btn btn-primary btn-lg">Register</button>
        <p class="helper-text">Already a member?<a href="login.php">Sign In</a> here.</p>
    </form>
</div>
</body>
</html>
