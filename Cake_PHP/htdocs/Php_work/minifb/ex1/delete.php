<?php
print_r($_GET);

echo"<hr>";

if(isset($_GET['id'])){
    echo "The id query string passed to the url is : ".$_GET['id'];
    //include connection file (optional)
    require_once('connect.php');
    //generate SQL command to delete the post
    $getID = $_GET['id'];
    $query = "DELETE FROM posts WHERE id=$getID";

    //To perform the query, it needs to be in a query statement:
    $result = mysqli_query($link, $query)
    or die("Error in query: ". mysqli_error($link));
    //the above sends a unique query to the currently active database
        

    //check if the row was deleted
    if(mysqli_affected_rows($link)==1){
        echo('Deletion Sucessful');
        //go back
        header("Location: index.php?deleted=1");
    }else{
        echo('Deletion Unsucessful?deleted=0');
    }

}else{
    echo "The id querey string is not set";
}