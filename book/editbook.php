<?php
include '../admin/includes/session.php';

if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$isbn = $_POST['isbn'];
	$title = $_POST['title'];
	$category = $_POST['category'];
	$author = $_POST['author'];

	$pub_date = $_POST['pub_date'];

	$sql = "UPDATE books SET isbn = '$isbn', title = '$title', category_id = '$category', author = '$author', publish_date = '$pub_date' WHERE id = '$id'";
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'Book updated successfully';
	} else {
		$_SESSION['error'] = $conn->error;
	}
} else {
	$_SESSION['error'] = 'Fill up edit form first';
}

header('location:book.php');

?>