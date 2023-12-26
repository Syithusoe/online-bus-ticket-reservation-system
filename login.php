<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login To Continue</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="logintest.css">
    <script src="logintest.js"></script>
</head>
<body>
<div class="box">
    <h2>Login To Continue</h2>
    <form class="material form" method="post" action="login.php">
        <?php include('error.php'); ?>
        <div class="form-group">
            <input type="text" class="form-control" name="username" required>
            <label>Username</label>
            <span class="input-border"></span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" required>
            <label>Password</label>
            <span class="input-border">
				</span>
        </div>
        <?php
        if(isset($_GET['redirect'])){
            echo '<input type="hidden" name="redirect" value="'.$_GET['redirect'].'">';
        }
        if(isset($_GET['bid'])){
            echo '<input type="hidden" name="bid" value="'.$_GET['bid'].'">';
        }
        ?>
        <button type="submit" name="login_user" class="btn btn-primary btn-lg">Login</button>
        <p class="helper-text">Don't have an account? <a href="register.php">Register</a> here.</p>
    </form>
</div>
</body>
</html>