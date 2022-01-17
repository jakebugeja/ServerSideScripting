
<?php
$totalPortfolio = 0;
$getUsername = $user_username;//get logged in email
$getSession =  $user_session;//get logged in id
echo "<div class='row'>";
echo "<h2>Your trades ($getUsername)</h2>";
if (count($allInvestments) >= 1){
        foreach($allInvestments as $investment){
            if($investment->user_id == $getSession ){
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
                echo "Notes: ";
                if($investment->note == ""){
                    echo "N/A";
                }else{
                    echo "$investment->note";
                }
                echo "<br>";
                $getTime =  $investment->created;
                echo " at ".$getTime->i18nFormat('dd-MMM-yyyy HH:mm');
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
    
if (count($allInvestments) >= 1){//NOTE IF USER IS ADMIN ADD FULL NAME TO THE CARD
        foreach($allInvestments as $investment){
            if($investment->privacy >0 ){
                echo "<div class='col-sm-6'>
                <div class='card'>
                <div class='card-body'><h3>";
                $getUser = $usersTable->findById($investment->user_id)->first();
                $fullname="";
                if($getUsername == 'admin@gmail.com'){
                    $fullname=$getUser->first_name." ".$getUser->last_name.", bought ";
                }
                echo $fullname.$investment->ticker->ticker;//show name
                echo "</h3><br>";
                echo "Bought shares $investment->share";
                echo " at $investment->bought_at";
                echo "<br>";
                echo "Total Spent: ". $investment->bought_at * $investment->share;
                echo "<br>";
                echo "Notes: ";
                if($investment->note == ""){
                    echo "N/A";
                }else{
                    echo "$investment->note";
                }
                echo "<br>";
                $getTime =  $investment->created;
                echo " at ".$getTime->i18nFormat('dd-MMM-yyyy HH:mm');
                
                echo "<br>Likes: $investment->like_counter";
                
                echo "<br>";
                //$isLiked = $likesTable->find()->where(['investment_id' => $investment->id],['user_id' => $investment->user_id])->first();
                $dislikeLink = $this->Url->build("/likes/dislike/".$investment->id);
                echo '<td><a href="'.$dislikeLink.'" class="btn btn-danger">Add Dislike</a>';
                $likeLink = $this->Url->build("/likes/like/".$investment->id);
                echo '<td><a href="'.$likeLink.'" class="btn btn-danger">Add Like</a>';

                if($getUsername == 'admin@gmail.com' ){
                    $deleteLink = $this->Url->build("/investments/delete/".$investment->id);
                    echo '<td><a href="'.$deleteLink.'" class="btn btn-danger">Delete</a>';
                }               

                echo "</div></div></div><br>";
            }
            
        }
    }
if($getUsername == 'admin@gmail.com' ){
    echo "<hr><h2>Private trades</h2>";
    echo "<div class='row'>";
    
    if (count($allInvestments) >= 1){//NOTE IF USER IS ADMIN ADD FULL NAME TO THE CARD
        foreach($allInvestments as $investment){
            if($investment->privacy ==0 ){
                echo "<div class='col-sm-6'>
                <div class='card'>
                <div class='card-body'><h3>";
                $getUser = $usersTable->findById($investment->user_id)->first();
                $fullname="";
                if($getUsername == 'admin@gmail.com'){
                    $fullname=$getUser->first_name." ".$getUser->last_name.", bought ";
                }
                echo $fullname.$investment->ticker->ticker;//show name
                echo "</h3><br>";
                echo "Bought shares $investment->share";
                echo " at $investment->bought_at";
                echo "<br>";
                echo "Total Spent: ". $investment->bought_at * $investment->share;
                echo "<br>";
                echo "Notes: ";
                if($investment->note == ""){
                    echo "N/A";
                }else{
                    echo "$investment->note";
                }
                echo "<br>";
                $getTime =  $investment->created;
                echo " at ".$getTime->i18nFormat('dd-MMM-yyyy HH:mm');
                
                echo "<br>Likes: $investment->like_counter";
                
                echo "<br>";
                if($getUsername == 'admin@gmail.com' ){
                    $deleteLink = $this->Url->build("/investments/delete/".$investment->id);
                    echo '<td><a href="'.$deleteLink.'" class="btn btn-danger">Delete</a>';
                }               

                echo "</div></div></div><br>";
            }
            
        }
    }
}
    echo "<div class='alert alert-primary' role='alert'>
        Your total Porfolio: $ $totalPortfolio</div>";
