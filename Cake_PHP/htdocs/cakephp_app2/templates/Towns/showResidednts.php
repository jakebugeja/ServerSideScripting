<h2>showResidents.php - TownsController</h2>

<p>This page will list all the users with residency in the town</p>

<?php
//NOTE:
        //allTowns, is passed from TownsController
        //code: $this->set('allTowns',$allTowns);

if (count($usersInTown) > 0) {
    echo "Listing ".count($usersInTown)." users(s) inside town<br><br>";

    echo '<table class="table">';
    echo '<tr>';
        echo "<th>Name</th>";
        echo "<th>Surname</th>";

    foreach ($usersInTown as $user) {
        echo "<tr>";
            echo "<td>".$usersInTown->first_name."</td>";
            echo "<td>".$usersInTown->last_name."</td>";
            echo "</tr>";
    }

    echo "</table>";
}
else
    echo "No users in town!";

?>