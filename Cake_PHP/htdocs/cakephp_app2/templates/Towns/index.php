<h2>Index.php - TownsController</h2>

<p>This page will list all the towns currently in the database</p>

<?php
//NOTE:
        //allTowns, is passed from TownsController
        //code: $this->set('allTowns',$allTowns);

if (count($allTowns) > 0) {
    echo "Listing ".count($allTowns)." town(s)<br><br>";
    
    echo '<table class="table">';
    echo '<tr>';
        echo "<th>ID</th>";
        echo "<th>Town Name</th>";
        echo "<th>Edit</th>";
        echo "<th>Delete</th>";
        echo "<th>Show residents</th>";
    echo "</tr>";

    foreach ($allTowns as $town) {
        echo "<tr>";
            echo "<td>".$town->id."</td>";
            echo "<td>".$town->town_name."</td>";

            $editLink = $this->Url->build("/towns/edit/".$town->id);
            echo '<td><a href="'.$editLink.'" class="btn btn-warning">Edit</a>';
            $deleteLink = $this->Url->build("/towns/delete/".$town->id);
            echo '<td><a href="'.$deleteLink.'" class="btn btn-danger">Delete</a>';
            $showResidentsLink = $this->Url->build("/towns/test/".$town->id);
            echo '<td><a href="'.$showResidentsLink.'" class="btn btn-primary">Show residents</a>';
            
        echo "</tr>";
    }

    echo "</table>";
}
else
    echo "No towns available!";

?>
<a href="<?=$this->Url->build("/towns/add")?>" class="btn btn-primary mt-2">Add a new town</a>

}