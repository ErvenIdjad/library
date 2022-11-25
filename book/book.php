<?php include '../admin/includes/session.php'; ?>
<?php include '../admin/includes/header.php'; ?>
<?php include '../admin/includes/variables.php'; ?>
<?php $book = 'active'; ?>
<?php
$catid = 0;
$where = '';
if (isset($_GET['category'])) {
    $catid = $_GET['category'];
    $where = 'WHERE books.category_id = ' . $catid;}
?>


<body>
    <?php include '../admin/includes/sidebar.php'; ?>
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
                        echo "
                                <div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-warning'></i> Error!</h4>
                                " . $_SESSION['error'] . "
                                </div>
                            ";
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
                            <h3 class="table-title">LIST OF BOOKS</h3>
                            <form class="example" action="book.php" method="GET">
                                <input type="text" id="myInput" name="search" placeholder="Search..." value="<?php if (isset($_GET['search'])) {
                                        echo $_GET['search'];
                                    } ?>">
                                <input type="submit" name="submit" class="submit" value="search">
                            </form>

                            <div class="box-header">
                                <a href="#addnew" data-toggle="modal"
                                    class="btn btn-primary btn-sm btn-flat action-borrow">Add Book <i
                                        class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="hidden"></th>
                                    <th>book id</th>
                                    <th>category</th>
                                    <th>book title</th>
                                    <th>author</th>
                                    <th>date published</th>
                                    <th>Status</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!isset($_GET['search'])) {

                                    $sql = "SELECT *, books.id AS bookid FROM books LEFT JOIN category ON category.id=books.category_id $where";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        if ($row['status']) {
                                            $status = '<span class="label label-danger">borrowed</span>';
                                        } else {
                                            $status = '<span class="label label-success">available</span>';
                                        }
                                        echo "
                                            <tr>
                                            <td>" . $row['isbn'] . "</td>
                                            <td>" . $row['name'] . "</td>
                                            <td>" . $row['title'] . "</td>
                                            <td>" . $row['author'] . "</td>
                                            <td>" . $row['publish_date'] . "</td>
                                            <td>" . $status . "</td>
                                            <td class='action'>
                                                <button class='actions btn btn-success btn-sm edit btn-flat' data-id='" . $row['bookid'] . "'><i class='fa fa-edit'></i> Edit</button>
                                                <button class='actions btn btn-danger btn-sm delete btn-flat' data-id='" . $row['bookid'] . "'><i class='fa fa-trash'></i> Delete</button>
                                            </td>
                                            </tr>
                                        ";
                                    }
                                } else {
                                    if (isset($_GET['search'])) {
                                        $sql = "SELECT *, books.id AS bookid FROM books LEFT JOIN category ON category.id=books.category_id $where";
                                        $query = $conn->query($sql);
                                        while ($row = $query->fetch_assoc()) {
                                            if ($row['status']) {
                                                $status = '<span class="label label-danger">borrowed</span>';
                                            } else {
                                                $status = '<span class="label label-success">available</span>';
                                            }
                                            echo "
                                                <tr>
                                                    <td>" . $row['name'] . "</td>
                                                    <td>" . $row['isbn'] . "</td>
                                                    <td>" . $row['title'] . "</td>
                                                    <td>" . $row['author'] . "</td>
                                                    <td>" . $row['publisher'] . "</td>
                                                    <td>" . $status . "</td>
                                                <td>
                                                    <button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['bookid'] . "'><i class='fa fa-edit'></i> Edit</button>
                                                    <button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['bookid'] . "'><i class='fa fa-trash'></i> Delete</button>
                                                </td>
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
                    <?php include '../admin/includes/book_modal.php'; ?>
                    <div class="categ form-group">
                        <select class="form-control input-sm" id="select_category">
                            <option value="0">ALL</option>
                            <?php
                            $sql = "SELECT * FROM category";
                                $query = $conn->query($sql);
                                        while ($catrow = $query->fetch_assoc()) {
                                            $selected = ($catid == $catrow['id']) ? " selected" : "";
                                            echo "
                                                <option value='" . $catrow['id'] . "' " . $selected . ">" . $catrow['name'] . "</option>
                                            ";
                                        }
                                        ?>
                        </select>
                    </div>
                    <?php
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $sql = "SELECT *, books.id AS bookid FROM books LEFT JOIN category ON category.id=books.category_id WHERE books.id = '$id'";
                        $query = $conn->query($sql);
                        $row = $query->fetch_assoc();
                    
                        echo json_encode($row);
                    }
                    ?>
                </div>
            </section>
        </div>
    </div>
<?php include '../admin/includes/scripts.php'; ?>
<script>
    $(function () {
        $('#select_category').change(function () {
            var value = $(this).val();
            if (value == 0) {
                window.location = 'book.php';
            }
            else {
                window.location = 'book.php?category=' + value;
            }
        });

        $(document).on('click', '.edit', function (e) {
            e.preventDefault();
            $('#edit').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            $('#delete').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id) {
        $.ajax({
            type: 'POST',
            url: 'book.php',
            data: { id: id },
            dataType: 'json',
            success: function (response) {
                $('.bookid').val(response.bookid);
                $('#edit_isbn').val(response.isbn);
                $('#edit_title').val(response.title);
                $('#catselect').val(response.category_id).html(response.name);
                $('#edit_author').val(response.author);
                $('#edit_publisher').val(response.publisher);
                $('#datepicker_edit').val(response.publish_date);
                $('#del_book').html(response.title);
            }
        });
    }
</script>
</body>

</html>