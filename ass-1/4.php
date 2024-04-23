<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) 
{
    $username = "user";
    $password = "password";

    if ($_POST['username'] == $username && $_POST['password'] == $password)
     {
        $_SESSION['logged_in'] = true;
        $_SESSION['login_time'] = time();
        $_SESSION['last_activity'] = time();
    } 
    else 
    {
        $error_message = "Invalid username or password!";
    }
}


if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
 {
    checkTimeout();
    header("Location: details.php");
    exit;
}
function checkTimeout() 
{
    $timeout = 300; // 5 minutes timeout
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) 
    {
        session_unset();
        session_destroy();
        echo "<p>Session expired due to inactivity.</p>";
        exit;
    }
    $_SESSION['last_activity'] = time();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) : ?>

        <h2>Login</h2>

        <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Username:</label>
            <input type="text" name="username"><br><br>
            <label>Password:</label>
            <input type="password" name="password"><br><br>
            <input type="submit" name="login" value="Login">
        </form>
    <?php endif; ?>
</body>
</html>


