<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Banking App - Search Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Search Users</h2>
    <form method="POST">
        <label>Search by username:</label>
        <input type="text" name="search_query" required><br>
        <button type="submit" name="search">Search</button>
    </form>

    <?php
    // Connect to the database
    $servername = "db";
    $username = "bankuser";
    $password = "bankpass";
    $dbname = "bankapp";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Vulnerable search function with SQL injection
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
        $search_query = $_POST['search_query'];

        // Vulnerable SQL query (for demonstration purposes)
        $sql = "SELECT username, bank_account FROM users WHERE username LIKE '%$search_query%'";
        $result = $conn->query($sql);

        // Check for SQL errors and display them
        if (!$result) {
            // Display error message and highlight only user input within the query
            echo "<div class='error'>SQL Error: " . htmlspecialchars($conn->error) . "<br><br>";
            $highlighted_sql = "SELECT username, bank_account FROM users WHERE username LIKE '%<span style='color: red;'>" . 
                               htmlspecialchars($search_query) . "</span>%'";
            echo "Full Query: " . $highlighted_sql . "</div>";
        } else {
            if ($result->num_rows > 0) {
                // Display results in a table
                echo "<h3>Search Results:</h3>";
                echo "<table border='1' cellspacing='0' cellpadding='10'>";
                echo "<tr><th>Username</th><th>Bank Account</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['bank_account']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No users found.</p>";
            }
        }
    }

    $conn->close();
    ?>
</div>
</body>
</html>
