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
<?php include 'includes/variables.php'; ?>
<?php $dashboard = 'active'; ?>

<body>

    <?php include 'includes/sidebar.php'; ?>
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
                        <div class="ldl">
                            <h1 class="ld">Librarian Dashboard</h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-blue">
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
                                    <a href="return.php" class="small-box-footer">See more<i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-olive">
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
                                    <a href="borrowed.php" class="small-box-footer">See more<i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
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
                                    <a href="book.php" class="small-box-footer">See more<i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-orange">
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
                                    <a href="student.php" class="small-box-footer">See more<i
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