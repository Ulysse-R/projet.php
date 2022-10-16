<?php
session_start();

$connection = new mysqli("db", "root", "password", "db_blog");
$username = $_GET["username"];
$password =$_GET["password"];
$data = $connection->query("SELECT id FROM users WHERE username='$username' AND password='$password'");
$row = mysqli_fetch_assoc($data);
//si le compte n'existe pas il sera créer automatiquement
if ($data->num_rows <= 0) {
    $insert = $connection->query("INSERT INTO users(username, password ) VALUES ('$username','$password')");
    $data = $connection->query("SELECT id FROM users WHERE username='$username' AND password='$password'");
    $row = mysqli_fetch_assoc($data);
}
// enregistrer les information du login dans la session
$id = (string)$row["id"]["0"];
$_SESSION["id"] = $id;
$_SESSION["loggedIn"] = 1;
header("Location: blog.php");
exit();
?>