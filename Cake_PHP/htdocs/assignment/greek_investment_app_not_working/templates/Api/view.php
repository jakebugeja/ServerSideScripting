<?php
echo "<div class='row'>";
if (count($allInvestments) >= 1){
        foreach($allInvestments as $investment){
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
                echo "<br>Likes: $investment->like_counter";
                echo "</div></div></div><br>";
            
            
        }
        echo "</div>";
    }
?>