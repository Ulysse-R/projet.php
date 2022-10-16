<?php
        session_start();
        $id = $_SESSION["id"];
		$connection = new mysqli("db", "root", "password", "db_blog");
		$data = $connection->query("SELECT title,content FROM posts");
        $row = mysqli_fetch_all($data);
?>
<DOCTYPE html>
    <html lang= "en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv= "X-UA-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <div class="container">
        <!-- navbar -->
        <div class="navbar">
            <div class="logo_div">
                <a href="index.php"><h1>LifeBlog</h1></a>
            </div>
            </ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="logout.php">Log Out</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About</a></li>
            </ul>
        </div>
        
    <form action="post.php" method="get">
        <h2>Post</h2>
        <input type="titre" name="poste" placeholder="poste">
        <input type="text" name="content" placeholder="content">
        <button class="btn" type="submit" name="publier_btn">Publier</button>
    </form>
    <table >
        <thead><tr>

            <th>Title</th>
            <th>Content</th>
            
        </thead>
        <tbody>
        <?php foreach ($row as $value){  ?>
        <tr>
        <td><?= $value[0] ?></td>
        <td><?= $value[1] ?></td>    
        </tr>
        <?php }; ?>
        
        
        </tbody>
        </table>