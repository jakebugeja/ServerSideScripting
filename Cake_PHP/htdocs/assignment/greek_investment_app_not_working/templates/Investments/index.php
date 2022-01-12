
<?php
$totalPortfolio = 0;
$username = $this->Identity->get('username');//show logged in username
$session =  $this->Identity->get('id');
echo "<div class='row'>";
echo "<h2>Your trades</h2>";
if (count($allInvestments) >= 1){
        foreach($allInvestments as $investment){
            if($investment->user_id == $session ){
                echo "<div class='col-sm-6'>
                <div class='card'>
                <div class='card-body'><h3>";
                echo $investment->ticker->ticker;//show name
                echo "</h3><br>";
                echo "Shares $investment->share";
                echo " at $investment->bought_at";
                echo "<br>";
                echo "Total Spent: ". $investment->bought_at * $investment->share;
                echo "<br>";
                echo "Notes:";
                echo "<br>";
                if($investment->note == ""){
                    echo "N/A";
                }else{
                    echo "$investment->note";
                }
                echo "<br>";
                echo " at $investment->created";
                echo "<br>";
                $deleteLink = $this->Url->build("/investments/delete/".$investment->id);
                echo '<td><a href="'.$deleteLink.'" class="btn btn-danger">Delete</a>';
                $editLink = $this->Url->build("/investments/edit/".$investment->id);            
                echo '<td><a href="'.$editLink.'" class="btn btn-warning">Edit</a>';       
                $shareLink = $this->Url->build("/investments/share/".$investment->id);            
                echo '<td><a href="'.$shareLink.'" class="btn btn-warning">Share</a>';  
                

                $totalPortfolio +=$investment->bought_at * $investment->share;
                echo "</div></div></div><br>";
            }
            
        }
        echo "</div>";
    }
    echo "<hr><h2>Public trades</h2>";
    echo "<div class='row'>";
if (count($allInvestments) >= 1){//NOTE IF SUER IS ADMIN ADD FULL NAME TO THE CARD
        foreach($allInvestments as $investment){
            if($investment->privacy >0 ){
                echo "<div class='col-sm-6'>
                <div class='card'>
                <div class='card-body'><h3>";
                echo $investment->ticker->ticker;//show name
                echo "</h3><br>";
                echo "Bought shares $investment->share";
                echo " at $investment->bought_at";
                echo "<br>";
                echo "Total Spent: ". $investment->bought_at * $investment->share;
                echo "<br>";
                echo "Notes:";
                echo "<br>";
                if($investment->note == ""){
                    echo "N/A";
                }else{
                    echo "$investment->note";
                }
                echo "<br>";
                echo " at $investment->created";
                echo "<br>";
                echo "<h3>Likes: ".$investment->like_counter."</h3><br>";
                $likeLink = $this->Url->build("/investments/like/".$investment->id);
                echo '<td><a href="'.$likeLink.'" class="btn btn-danger">Add Like</a>';
                /*
                $deleteLink = $this->Url->build("/investments/delete/".$investment->id);
                echo '<td><a href="'.$deleteLink.'" class="btn btn-danger">Delete</a>';
                $editLink = $this->Url->build("/investments/edit/".$investment->id);            
                echo '<td><a href="'.$editLink.'" class="btn btn-warning">Edit</a>';       
                */
                


                $totalPortfolio +=$investment->bought_at * $investment->share;
                echo "</div></div></div><br>";
            }
            
        }
    }
    echo "<div class='alert alert-primary' role='alert'>
        Total Porfolio: $totalPortfolio</div>";
