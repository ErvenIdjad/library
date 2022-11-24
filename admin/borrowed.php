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
                            <h3 class="table-title">Borrowed Books</h3>

                            <div class="box-header">
                                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat action-borrow"><i class="fa fa-plus"></i> Borrow</a>
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
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "SELECT *, students.student_id AS stud, borrow.status AS barstat FROM borrow LEFT JOIN students ON students.id=borrow.student_id LEFT JOIN books ON books.id=borrow.book_id ORDER BY date_borrow DESC";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    if ($row['barstat']) {
                                        $status = '<span class="label label-success">RETURNED</span>';
                                    } else {
                                        $status = '<span class="label label-danger">NOT RETURNED</span>';
                                    }
                                    echo "
                    <tr>
                        <td class='hidden'></td>
                        <td>" . $row['stud'] . "</td>
                        <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                        <td>" . $row['isbn'] . "</td>
                        <td>" . $row['title'] . "</td>
                        <td>" . date('M d, Y', strtotime($row['date_borrow'])) . "</td>
                        <td>" . $status . "</td>
                    </tr>
                    ";
                                }
                                ?>
                            </tbody>
                    </div>
                </div>
                <?php include 'includes/borrow_modal.php'; ?>
        </div>
        <?php include '../admin/includes/scripts.php'; ?>
        <script>
            function rem_select() {
                $('[name="isbn[]"]').change(function () {
                    if ($(this).val() == '<rem>') {
                        $(this).closest('.form-group').remove()
                    }
                })
            }
            $(function () {
                $(document).on('click', '#append', function (e) {
                    e.preventDefault();
                    var books = '<?php echo json_encode($brows) ?>';
                    var _s = $('<select class="form-control" name="isbn[]"></select>')
                    var _tmp = $('<div></div>')
                    var option = '';
                    option += '<option value="" selected disabled>Please Select Book here.</option>';
                    option += '<option value="<rem>" >< remove select></option>';
                    books = JSON.parse(books)
                    if (books.length > 0) {
                        Object.keys(books).map(k => {
                            option += '<option value="' + books[k].isbn + '">' + books[k].title + ' [' + books[k].isbn + ']' + '</option>'
                        })
                    }
                    _s.append(option)
                    _tmp.append(_s)

                    // $('#append-div').append(
                    //   '<div class="form-group"><label for="" class="col-sm-3 control-label">ISBN</label><div class="col-sm-9"><input type="text" class="form-control" name="isbn[]"></div></div>'
                    // );
                    $('#append-div').append(
                        '<div class="form-group"><label for="" class="col-sm-3 control-label">ISBN</label><div class="col-sm-9">' + _tmp.html() + '</div></div>'
                    );
                    rem_select()
                });
            });

        </script>
</body>