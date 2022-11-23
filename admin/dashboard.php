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
    <div class="wrappers">
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
                            <h1>Dashboard</h1>
                            <div class="row">
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM books";
                                            $query = $conn->query($sql);

                                            echo "<h3>" . $query->num_rows . "</h3>";
                                            ?>

                                            <p>Total Books</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <a href="book.php" class="small-box-footer">More info <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM students";
                                            $query = $conn->query($sql);

                                            echo "<h3>" . $query->num_rows . "</h3>";
                                            ?>

                                            <p>Total Students</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-graduation-cap"></i>
                                        </div>
                                        <a href="student.php" class="small-box-footer">More info <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM returns WHERE date_return = '$today'";
                                            $query = $conn->query($sql);

                                            echo "<h3>" . $query->num_rows . "</h3>";
                                            ?>

                                            <p>Returned Today</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-mail-reply"></i>
                                        </div>
                                        <a href="return.php" class="small-box-footer">More info <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM borrow WHERE date_borrow = '$today'";
                                            $query = $conn->query($sql);

                                            echo "<h3>" . $query->num_rows . "</h3>";
                                            ?>

                                            <p>Borrowed Today</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-mail-forward"></i>
                                        </div>
                                        <a href="borrow.php" class="small-box-footer">More info <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>