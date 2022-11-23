<?php







?>

<?php
include 'includes/timezone.php';
$today = date('Y-m-d');
$year = date('Y');
if (isset($_GET['year'])) {
    $year = $_GET['year'];
}
?>

<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>


<body>
    <div class="wrapper">
        <div class="side-bar">
            <div class="logo-details">
                <span class="admin-name">Admin</span>
                <i class='bx bxs-user-circle'></i>
            </div>
            <ul class="nav-links">
                <li class="active">
                    <a href="#">
                        <i class='bx bxs-dashboard'></i>
                        <span class="links-name">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-transfer'></i>
                        <span class="links-name">Transaction</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bxs-book'></i>
                        <span class="links-name">Books</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bxs-graduation'></i>
                        <span class="links-name">Students</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bxs-user-rectangle'></i>
                        <span class="links-name">Teachers</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bxs-cog'></i>
                        <span class="links-name">Settings</span>
                    </a>
                </li>
                <li id="logout">
                    <a href="../login/logout.php">
                        <i class='bx bx-log-out'></i>
                        <span class="links-name">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content">

            <div class="info">
                <section class="home-section">
                    <nav>
                        <div class="profile-details">
                            <i class='bx bx-menu' style='color:#FFFFF'></i>
                        </div>
                        <div class="side-bar-button">
                            <i class='bx bxs-book-heart'></i>
                            <span class="logo-name">School Library</span>
                        </div>
                    </nav>
                    <div class="home-content">
                        <div class="dashboard-boxes">
                            <div class="box one">
                                <div class="right-side">
                                    <div class="number">20</div>
                                    <div class="box-topic">Total Books</div>
                                </div>
                                <i class='bx bxs-book icon a'></i>
                            </div>

                            <div class="box two">
                                <div class="right-side">
                                    <div class="number">8</div>
                                    <div class="box-topic">Total Students</div>
                                </div>
                                <i class='bx bxs-graduation icon b'></i>
                            </div>

                            <div class="box three">
                                <div class="right-side">
                                    <div class="number">1</div>
                                    <div class="box-topic">Returned Today</div>
                                </div>
                                <i class='bx bx-arrow-to-left icon c'></i>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>



</body>

</html>