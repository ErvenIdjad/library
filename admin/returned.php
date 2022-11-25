<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/variables.php'; ?>
<?php $returned = 'active'; ?>


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
                    <?php
                    if (isset($_SESSION['error'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> Error!</h4>
                        <ul>
                            <?php
                        foreach ($_SESSION['error'] as $error) {
                            echo "
                                    <li>" . $error . "</li>
                                ";
                        }
                            ?>
                        </ul>
                    </div>
                    <?php
                        unset($_SESSION['error']);
                    }

                    if (isset($_SESSION['success'])) {
                        echo "
                                <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-check'></i> Success!</h4>
                                " . $_SESSION['success'] . "
                                </div>
                            ";
                        unset($_SESSION['success']);
                    }
                    ?>

                    <div class="table-container">
                        <div class="table-heading">
                            <h3 class="table-title">RETURNED BOOKS</h3>
                            <form class="example" action="returned.php" method="GET">
                                <input type="text" id="myInput" name="search" placeholder="Search for Student ID.."
                                    value="<?php if (isset($_GET['search'])) {
                                        echo $_GET['search'];
                                    } ?>">
                                <input type="submit" name="submit" class="submit" value="search">
                            </form>

                            <div class="box-header">
                                <a href="#addnew" data-toggle="modal"
                                    class="btn btn-primary btn-sm btn-flat action-borrow">Add Return <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="hidden"></th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Book title</th>
                                    <th>Book Number</th>
                                    <th>Date Returned</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (!isset($_GET['search'])) {

                                    $sql = "SELECT *, students.student_id AS stud FROM returns LEFT JOIN students ON students.id=returns.student_id LEFT JOIN books ON books.id=returns.book_id ORDER BY date_return DESC";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                       

                                        echo "
                                        <tr id='myUL'>
                                            <td class='hidden'></td>
                                            <td>" . $row['stud'] . "</td>
                                            <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                                            <td>" . $row['isbn'] . "</td>
                                            <td>" . $row['title'] . "</td>
                                            <td>" . date('M d, Y', strtotime($row['date_return'])) . "</td>
                                        </tr>
                                        ";
                                    }
                                } else {
                                    if (isset($_GET['search'])) {
                                        $searched = $_GET['search'];
                                        $sql = "SELECT *, students.student_id AS stud FROM returns LEFT JOIN students ON students.id=returns.student_id LEFT JOIN books ON books.id=returns.book_id WHERE CONCAT (students.student_id) LIKE '%$searched%' ";
                                        $query = $conn->query($sql);
                                        while ($row = $query->fetch_assoc()) {
            
                                            echo "
                                            <tr id='myUL'>
                                                <td class='hidden'></td>
                                            <td>" . $row['stud'] . "</td>
                                            <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                                            <td>" . $row['isbn'] . "</td>
                                            <td>" . $row['title'] . "</td>
                                            <td>" . date('M d, Y', strtotime($row['date_return'])) . "</td>
                                            </tr>
                                            ";
                                        }
                                    } else {
                                        echo "NO RECORDS FOUND!!!";
                                    }
                                }

                                ?>
                            </tbody>
                    </div>
                </div>
                <?php include 'includes/return_modal.php'; ?>
            </section>
        </div>
        <?php include '../admin/includes/scripts.php'; ?>

    </div>


</body>