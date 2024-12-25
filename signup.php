<?php
    require_once 'includes/configsession.php';
    require_once 'includes/signup-view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="formcontainer">
            <form action="includes/signup-inc.php" method="post">

            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username">


                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Email">
            
            
                <label for="password">Password</label>
                <input type="password" name="pwd" id="password" placeholder="Password"> <br>
        
        <button class="sign" type="submit" name="submit">Sign Up</button>
            </form>

            
            <p class="signup"> Have an account?
                    <a href="includes/signin.php" class="">Sign in</a>
                </p>
        
        <div>


<?php
    check_signup_errors();
?>
</body>
</html>