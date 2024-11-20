<?php
session_start();

// Connect to the database
$servername = "db";
$username = "bankuser";
$password = "bankpass";
$dbname = "bankapp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Secure login with prepared statements
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind parameters to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;              // Store username in session
        $_SESSION['user_uuid'] = uniqid('', true);      // Generate unique ID for user session
        header('Location: account.php'); // Redirect to login if not logged in
    } else {
        echo "Invalid username or password.";
    }
    $stmt->close();
}

$conn->close();
?>

<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Banking App - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2 class="centered-text">Welcome to the Banking App</h2>
    <?php if (!isset($_SESSION['username'])): ?>
        <p class="centered-text">Please log in to access your account.</p>
        <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit" name="login">Login</button>
        </form>
    <?php else: ?>
        <p>You are logged in as <?php echo htmlspecialchars($_SESSION['username']); ?>.</p>
        <a href="account.php">Upload new statements</a>
    <?php endif; ?>
</div>
</body>
</html>
