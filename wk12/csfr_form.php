<?php
session_start();
$_SESSION['confirmation'] = bin2hex(random_bytes(16));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSRF Protected Form</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 60px auto; }
        input { display: block; width: 100%; margin: 8px 0; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 20px; background: #333; color: #fff; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Login (Protected)</h2>
    <form method="POST" action="csfr_action.php">
        <input type="hidden" name="confirmation" value="<?php echo $_SESSION['confirmation']; ?>" />
        <label>Username:</label>
        <input type="text" name="username" />
        <label>Password:</label>
        <input type="password" name="password" />
        <button type="submit">Login</button>
    </form>
</body>
</html>
