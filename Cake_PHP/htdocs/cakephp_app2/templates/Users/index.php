<h2>Users -Index</h2>

<p>This page will list all the users currently in the database</p>

<?php
    //NOTE:
        //allUsers, is passed from UsersController
        //code: $this->set('allUsers',$allUsers);

if (count($allUsers) > 0) {
    echo "Listing ".count($allUsers)." user(s)<br><br>";
    
    echo '<table class="table">';
    echo '<tr>';
        echo "<th>ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Edit</th>";
        echo "<th>Delete</th>";
    echo "</tr>";

    foreach ($allUsers as $user) {
        echo "<tr>";
            echo "<td>".$user->id."</td>";
            echo "<td>".$user->first_name."</td>";
            echo "<td>".$user->last_name."</td>";

            //$editLink = $this->Url->build("/users/edit/".$user->id);
            //echo '<td><a href="'.$editLink.'" class="btn btn-warning">Edit</a>';
            //$deleteLink = $this->Url->build("/users/delete/".$user->id);
            //echo '<td><a href="'.$deleteLink.'" class="btn btn-warning">Delete</a>';
            
        echo "</tr>";
    }

    echo "</table>";
}
else
    echo "No users available";

?>
<!--
    button add user
-->