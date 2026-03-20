<?php
$message = "";
$show_message = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    $show_message = true;

    if ($username === "host" && $password === "pass") {
        $message = "Login successful! Welcome, host.";
        $message_class = "success";
    } else {
        $message = "Login failed. Invalid username or password.";
        $message_class = "failure";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSRF Demo - Login</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 60px auto; }
        input { display: block; width: 100%; margin: 8px 0; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 20px; background: #333; color: #fff; border: none; cursor: pointer; }
        #splash { display: <?php echo $show_message ? "block" : "none"; ?>; margin-top: 16px; padding: 12px; border-radius: 4px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .failure { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="csfr.php">
        <label>Username:</label>
        <input type="text" name="username" />
        <label>Password:</label>
        <input type="password" name="password" />
        <button type="submit">Login</button>
    </form>

    <div id="splash" class="<?php echo $message_class ?? ''; ?>">
        <?php echo $message; ?>
    </div>
</body>
</html>
