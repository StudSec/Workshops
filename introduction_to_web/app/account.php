<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php'); // Redirect to login if not logged in
    exit();
}

// Get the user's UUID directory
$user_dir = 'uploads/' . $_SESSION['uuid'];
if (!is_dir($user_dir)) {
    mkdir($user_dir, 0777, true);
}

$upload_error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['statement'])) {
    $file_name = basename($_FILES['statement']['name']);
    $target_file = $user_dir . '/' . $file_name;

    if (move_uploaded_file($_FILES['statement']['tmp_name'], $target_file)) {
        $upload_error = "File uploaded successfully!";
    } else {
        $upload_error = "Error uploading file.";
    }
}

// List uploaded files
$uploaded_files = array_diff(scandir($user_dir), array('.', '..'));
?>

<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Banking App - Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Your Account</h2>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! Here you can upload and view your bank statements.</p>

    <!-- Display upload error or success messages -->
    <?php if ($upload_error): ?>
        <div class="error"><?php echo htmlspecialchars($upload_error); ?></div>
    <?php endif; ?>

    <!-- File upload form -->
    <h3>Upload a New Bank Statement</h3>
    <form action="account.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="statement" required><br>
        <button type="submit">Upload</button>
    </form>

    <!-- List of uploaded files -->
    <h3>Your Uploaded Files</h3>
    <?php if (!empty($uploaded_files)): ?>
        <ul>
            <?php foreach ($uploaded_files as $file): ?>
                <li><a href="<?php echo htmlspecialchars($user_dir . '/' . $file); ?>" target="_blank"><?php echo htmlspecialchars($file); ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No files uploaded yet.</p>
    <?php endif; ?>
</div>
</body>
</html>
