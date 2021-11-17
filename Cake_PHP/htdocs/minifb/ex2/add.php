<?php
$title=$_POST['title'];
$desc=$_POST['desc'];
$time = time();

//[5] insert into database
if (!empty($title) && !empty($desc)) {
    require("classes/Post.php");
    $newPost = new Post($title,$desc,$time);

    
    if($newPost->addPost() == true){
        echo '<div class="alert alert-primary" role="alert">
        Post - Successfully Added!</div>';
    }else{
        echo '<div class="alert alert-warning" role="alert">
        Post - Something went wrong!</div>';
    }
    
}

?>