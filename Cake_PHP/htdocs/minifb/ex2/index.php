<!DOCTYPE html>
<!--Comments are on moodle-->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>MiniFB -- PHP</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <dic class="col-8 offset-2">
        <?php
            require_once('connect.php');
        ?>
        <h2>List of Posts</h2>
            <?php
                //Insert Posts
                if(isset($_POST['submit'])){
                        require_once('add.php');//execute add.php
                }else{
                    require("classes/Post.php");//continue below code
                }
            ?>
            <?php   
            
            //to access static mathods without an instance of the class, hence ::
            $allPosts = Post::getAll();
            if(count($allPosts)>0){
                echo '<div class="alert alert-primary">Showing '.count($allPosts).' post(s)</div>';
            }

            if(count($allPosts)>0){//if the number of retrieved rows from the server > 0

                echo '<div class="alert alert-primary">Showing '.count($allPosts).' post(s)</div>';
                //looping through an array (replaced tbe while loop) 
                foreach ($allPosts as $singlePost){
                    echo "<h5>".$singlePost->title."</h5>";
                    echo "<hr>";
                    echo "<p>".$singlePost->description."</p>";
                    echo "<p> Posted: ".date('dS F Y H:i', $singlePost->time)."</p>";
                    //<a href='../sample/passed-data-via-url.php?name=Jim'>To Bridge</a>
                    echo '<a href=delete.php?id='.$singlePost->id.'>Delete Post</a>';
                }
            }
            ?>
            <?php
                //Was delete.php successful 
                //is delete == 0 || is delete == 1 (passed in parameter)
                require_once("connect.php");
                //if (isset($_GET['deleted'])){//if recieved

                if(isset($_GET['deleted'])==1){
                        echo '<div class="alert alert-primary" role="alert">
                                Post successfully deleted
                            </div>';
                }else if(isset($_GET['deleted'])==0){
                        echo '<div class="alert alert-primary" role="alert">
                                Post unsuccessfully deleted
                            </div>';
                }else{
                    echo "error in index.php/delete function";
                }
            ?>
            <hr>
            <form action="index.php" method="post">
                <label>Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Enter title">
                <label>Description:</label>
                <input type="text" class="form-control" name="desc" placeholder="Enter description"><br>

                <input type="submit" name="submit" class="btn btn-secondary" value="Add Post"/>
            </form>
        </div>
    </div>
    
</body>
</html>


