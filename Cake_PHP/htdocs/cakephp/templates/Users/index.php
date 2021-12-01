<h2>Users - Index</h2>
<p>This is the view for the Users controller, index action!</p>

<?php

//$allUsers is available because in the UsersController we sent some data using the set() method.

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

            $editLink = $this->Url->build("/users/edit/".$user->id);
            echo '<td><a href="'.$editLink.'" class="btn btn-warning">Edit</a>';
            $deleteLink = $this->Url->build("/users/delete/".$user->id);
            echo '<td><a href="'.$deleteLink.'" class="btn btn-warning">Delete</a>';
            
        echo "</tr>";
    }

    echo "</table>";
}
else
    echo "No users available";

?>

<a href="<?=$this->Url->build('/users/add')?>" class="btn btn-primary">Add User</a>