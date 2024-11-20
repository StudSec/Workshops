<div class="navbar">
    <?php if (isset($_SESSION['username'])): ?>
        <a href="account.php">Statements</a>
    <?php endif; ?>
    <a href="search.php">Search</a>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="index.php">Login</a>
    <?php endif; ?>
</div>
