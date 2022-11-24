<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/variables.php'; ?>
<?php $borrowed = 'active'; ?>

<?php
include 'includes/timezone.php';
$today = date('Y-m-d');
$year = date('Y');
if (isset($_GET['year'])) {
    $year = $_GET['year'];
}
?>


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

                    <div class="table-container">
                        <div class="table-heading">
                            <h3 class="table-title">Available Programs</h3>

                            <a href="addprogram.php" class="button">Add New Program</a>

                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Program Code</th>
                                    <th>Description</th>
                                    <th>Years to Complete</th>
                                    <th>Level</th>
                                    <th>CET Requirements</th>
                                    <th>Status</th>

                                    <th class="action">Action</th>

                                </tr>
                            </thead>

                    </div>
                </div>
        </div>
</body>