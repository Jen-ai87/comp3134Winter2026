<?php
session_start();

$message = "";
$message_class = "";
$show_message = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $show_message = true;
    $session_token = $_SESSION['confirmation'] ?? '';
    $posted_token = $_POST['confirmation'] ?? '';

    if ($session_token !== $posted_token) {
        $message = "Invalid request. CSRF detected!";
        $message_class = "failure";
    } else {
        $username = $_POST["username"] ?? "";
        $password = $_POST["password"] ?? "";

        if ($username === "host" && $password === "pass") {
            $message = "Login successful! Welcome, host.";
            $message_class = "success";
        } else {
            $message = "Login failed. Invalid credentials.";
            $message_class = "failure";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSRF Action</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 60px auto; }
        #splash { display: <?php echo $show_message ? "block" : "none"; ?>; margin-top: 16px; padding: 12px; border-radius: 4px; }
        .success { background: #d4edda; color: #155724; }
        .failure { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <h2>CSRF Action Result</h2>
    <div id="splash" class="<?php echo $message_class; ?>">
        <?php echo $message; ?>
    </div>
</body>
</html>
