<?php
$title=$_POST['title'];
$desc=$_POST['desc'];
$time = time();

//[5] insert into database
if (!empty($title) && !empty($desc)) {
    require("connect.php");

    $query = "INSERT INTO posts (title, description, time) VALUES ('$title', '$desc','$time')";
    mysqli_query($link,$query) or die(mysqli_error($link));

    echo '<div class="alert alert-primary" role="alert">
    Post - Successfully Added!</div>';
}

?>