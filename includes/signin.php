<?php
    session_start();
    require_once 'dbh-inc.php';
    require_once 'login-view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
</body>
</html>
    <h3>
        <?php
            output_username();
        ?>
    </h3>

    <div class="formcontainer">
    <?php
    if (!isset($_SESSION["user_id"])) { ?>
        
<form action="login-inc.php" method="post">

    <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        
        <label for="password">Password</label>
        <input type="password" name="pwd" id="password">
        
        <button type="submit" name="submit">Sign In</button>
        
    </div>
</form>

<?php } ?>

        <p class="signup"> Don't have an account?
            <a href="../signup.php">Sign up</a>
        </p>

        
    
    <form action="forgot.php" method="post">
        <button type="submit">Forgot Password</button>
    </form>
        
    </div>
 
<?php
    check_login_errors();
?>
