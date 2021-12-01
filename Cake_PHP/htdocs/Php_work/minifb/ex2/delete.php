<?php
print_r($_GET);
echo"<hr>";

if(isset($_GET['id'])){
    require("classes/Post.php");
    echo "The id query string passed to the url is : ".$_GET['id'];
    $getID = $_GET['id'];
    //to access static mathods without an instance of the class, hence ::
    $isDeletePost = Post::deletePost($getID);//return true or false
    if(true){
        header("Location: index.php?deleted=1");
    }else{
        echo("delete.php: error");
    }
    
}else{
    echo "The id querey string is not set";
}