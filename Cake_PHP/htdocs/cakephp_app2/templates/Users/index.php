<h2>Users -Index</h2>

<p>This page will list all the users currently in the database</p>

<?php
    if(isset($allUsers)){
        echo "I have allUsers";
        if(count($allUsers)>0){
            echo "Showing ".count($allUsers). " user(s)...<br>";
        }
    }
?>