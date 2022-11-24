<?php

include 'includes/conn.php';

include 'includes/session.php';

if (isset($_GET['search'])) {
    $searched = $_POST['search'];
    $sql = "SELECT *, students.student_id AS stud, borrow.status AS barstat FROM borrow LEFT JOIN students ON students.id=borrow.student_id LEFT JOIN books ON books.id=borrow.book_id WHERE CONCAT (students.student_id) LIKE '%$searched%' ";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        if ($row['barstat']) {
            $status = '<span class="label label-success">RETURNED</span>';
        } else {
            $status = '<span class="label label-danger">NOT RETURNED</span>';
        }

        echo "
            <tr id='myUL'>
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
}else{
    echo "NO RECORDS FOUND!!!";
}

?>