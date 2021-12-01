<h2>Users</h2>
<p>This is the index.php file for UsersController</p>

<?php
    foreach($allUsers as $user){
        echo $user->first_name." ".$user->last_name;
        echo"<hr>";
    }
?>    