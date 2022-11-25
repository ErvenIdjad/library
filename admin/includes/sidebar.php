

<div class="wrappers">
    <div class="side-bar">
        <div class="logo-details">
            <span class="admin-name">Admin</span>
            <i class='bx bxs-user-circle'></i>
        </div>
        <ul class="nav-links">
            <li class="<?php echo $dashboard; ?>">
                <a href="../admin/dashboard.php">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="links-name">Dashboard</span>
                </a>
            </li>
            <li class="<?php echo $borrowed; ?>">
                <a href="../borrow/borrowed.php">
                    <i class="fa fa-mail-forward"></i>
                    <span class="links-name">Borrowed Books</span>
                </a>
            </li>
            <li class="<?php echo $returned; ?>">
                <a href="../return/returned.php">
                    <i class="fa fa-mail-reply"></i>
                    <span class="links-name">Returned Books</span>
                </a>
            </li>
            <li class="<?php echo $book; ?>">
                <a href="../book/book.php">
                    <i class='bx bx-book-open'></i>
                    <span class="links-name">Book list</span>
                </a>
            </li>
            <li class="<?php echo $category; ?>">
                <a href="../admin/category.php">
                    <i class='bx bx-filter'></i>
                    <span class="links-name">Book Category</span>
                </a>
            </li>
            <li class="<?php echo $students; ?>">
                <a href="../admin/students.php">
                    <i class='bx bxs-graduation'></i>
                    <span class="links-name">Students</span>
                </a>
            </li>
            <li class="<?php echo $teachers; ?>">
                <a href="../admin/teachers.php">
                    <i class='bx bxs-user-rectangle'></i>
                    <span class="links-name">Teachers</span>
                </a>
            </li>
            <li class="<?php echo $settings; ?>">
                <a href="../admin/settings.php">
                    <i class='bx bxs-cog'></i>
                    <span class="links-name">Settings</span>
                </a>
            </li>
            <li id="logout">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links-name">Logout</span>
                </a>
            </li>
        </ul>
    </div>