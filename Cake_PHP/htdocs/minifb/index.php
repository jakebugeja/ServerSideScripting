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
            $sqlGetPosts = "SELECT * FROM posts";

            //send sql command (string) to mysql server
            $result = mysqli_query($link, $sqlGetPosts);
            //the above sends a unique query to the currently active database

            if(mysqli_num_rows($result)>0){//if the number of retrieved rows from the server > 0

                echo '<div class="alert alert-primary">Showing '.mysqli_num_rows($result).' post(s)</div>';

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<h5>".$row['title']."</h5>";
                    echo "<hr>";
                    echo "<p>".$row['description']."</p>";
                    echo "<p> Posted: ".date('dS F Y H:i', $row['time'])."</p>";
                }
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
            
            <?php
            if(isset($_POST['submit'])){
                $title=$_POST['title'];
                $desc=$_POST['desc'];

                //[5] insert into database
                if (!empty($title) && !empty($desc)) {
                    require("connect.php");

                    $query = "INSERT INTO posts (title, description) VALUES ('$title', '$desc')";
                    mysqli_query($link,$query) or die(mysqli_error($link));
                }
                
            }
        ?>
        
        </div>
    </div>
    <?php
        require("connect.php");
    ?>
    
</body>
</html>


