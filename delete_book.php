<?php

include "connect.php";

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM books WHERE id=$id"
);

header("Location: books.php");
exit();

?>