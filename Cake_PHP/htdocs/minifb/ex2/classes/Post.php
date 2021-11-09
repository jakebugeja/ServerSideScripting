<?php

class Post{
    public $id;
    public $title;
    public $description;

    public function __contruct($_title, $_description, $_time){
        $this->title = $_title;
        $this->description = $_description;
        if($_time == "")
            $this->time = time();
        else
            $this->time = $_time;
    }

    //this will allow programmer to access the method without creating
    //an instance of the class
    //Post::getALL();
    public static function getAll(){//static, hence to access method without an instance
        require("connect.php");//... --> go back

        //Retrieve and show Posts
        $sqlGetPosts = "SELECT * FROM posts";

        //send sql command (string) to mysql server
        $result = mysqli_query($link, $sqlGetPosts);
        //the above sends a unique query to the currently active database

        if(mysqli_num_rows($result)>0){
            //empty array
            $posts = array();//creating an array

            while ($row = mysqli_fetch_assoc($result)){
                $newPost = new Post($row['title'],$row['description'],$row['time']);
                $newPost = $row['id'];

                //append the post instance to $posts array
                $allPosts[] = $newPost;//pushing every object to an array
            }
            return $allPosts;//return array with all the posts
        }
        return null;
    }
}

?>