<?php
session_start();
$connection = new mysqli("db", "root", "password", "db_blog");
$poste = $_GET["poste"];
$content =$_GET["content"];
$id = $_SESSION["id"];
$insert = $connection->query("INSERT INTO posts(title, content,user_id ) VALUES ('$poste','$content','$id')");

header("Location: blog.php");
exit();
?>