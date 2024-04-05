<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM blogs WHERE blogs.id = :blogId';
$stmt = $connection->prepare($query);
$blogId = $_GET['id'];
$stmt->bindParam(':blogId', $blogId, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: blog_list.php');
?>