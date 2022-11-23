<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location:dashboard.php');
}
?>

<?php include 'includes/header.php'; ?>

<body>
    <div class="container">
        <form action="login.php" method="post" class="login-form">
            <div class="details">
                <span class="signin">SIGN IN</span>
                <i class='bx bxs-book-heart'></i>
            </div>
            <hr class="divider">
            <label for="username">Username</label>
            <input type="text" name="username">
            <label for="password">Password</label>
            <input type="password" name="password">
            <button class="btn" name="btn">SIGN IN</button>
            <a href="login.php">
                <p class="forgot">Forgot password?</p>
            </a>
            <?php
            if (isset($error)) {
                echo '<div><p class="error">' . $error . '</p></div>';
            }

            ?>
        </form>
    </div>
</body>

</html>