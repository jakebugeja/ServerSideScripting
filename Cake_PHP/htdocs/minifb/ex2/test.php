<?php
    require ("classes/Person.php");


    

    //Without constructor
    /*
    //new instance of the person class
    $person1 = new Person;

    $person1->first_nam = "Joe";
    $person1->last_name = "Cutajar";
    $person1->yob = 1950;*/
    
    //With constructor
    //person1
    $person1 = new Person("Joe","Cutajar",1990);

    echo "Our person class: {$person1->first_name} {$person1->last_name} YOB: {$person1->getYOB()}<br>";

    $age = $person1->getAge();
    echo "{$person1->first_name} is $age years old";

    //person2    
    $person2 = new Person("Mary");
    echo "<hr>";
    require("classes/Post.php");

    //to access static mathods without an instance of the class, hence ::
    $allPosts = Post::getAll();
    //if the array is not empty
    if(count($allPosts)>0){
        echo "<pre>";
        print_r($allPosts); 
        echo "</pre>";

        //go through all the posts (array of objects)
        foreach($allPosts as $singlePost){
            echo $singlePost->title ."<hr>";
        }
    }else{
        echo "no posts available - test.php";
    }
    
    
?>