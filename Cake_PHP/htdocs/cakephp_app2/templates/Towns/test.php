<h2>showResidents.php - TownsController</h2>

<p>This page will list all the users with residency in the town</p>

<?php
//NOTE:
        //allTowns, is passed from TownsController
        //code: $this->set('allTowns',$allTowns);

if (count($usersInTown) > 0) {
    echo "Listing ".count($usersInTown->users)." user(s) inside ".$usersInTown->town_name."<br><br>";

    
    foreach($usersInTown->users as $user){
        //echo "<td>".$usersInTown->users[1 (looping through)]->first_name."</td>";
        ?>
        <div class="card">
            <div class="card-body">
            <h5 class="card-title"><?=$user->first_name ." ".$user->last_name?></h5>
        </div>
        </div>
        <br>
    <?php
    }
        
        
}

?>