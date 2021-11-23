<?php

class Post{
    public $id;
    public $title;
    public $description;

    public function __construct($_title, $_description, $_time=""){
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

        $allPosts = array();//creating an array

        if(mysqli_num_rows($result)>0){
            //empty array
            

            while ($row = mysqli_fetch_assoc($result)){
                $newPost = new Post($row['title'],$row['description'],$row['time']);
                $newPost->id= $row['id'];

                //append the post instance to $posts array
                $allPosts[] = $newPost;//pushing every object to an array
            }
            return $allPosts;//return array with all the posts
        }
        return $allPosts;
    }
    //add method 
    public function addPost(){
        require("connect.php");

        $query = "INSERT INTO posts (title, description, time) VALUES 
            ('{$this->title}', '{$this->description}','{$this->time}')";
        mysqli_query($link,$query) or die(mysqli_error($link));
    
        return true;
    }
    //delete method
    public static function deletePost($_id){
        //include connection file (optional)
        require_once('connect.php');
        $query = "DELETE FROM posts WHERE id=$_id";

        //To perform the query, it needs to be in a query statement:
        $result = mysqli_query($link, $query)
        or die("Error in query: ". mysqli_error($link));
        //the above sends a unique query to the currently active database
            

        //check if the row was deleted
        if(mysqli_affected_rows($link)==1){
            return true;
        }else{
            return false;
        }
    }
}

?>