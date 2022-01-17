
<?php
echo "<div class='row'>";
if (count($allUsers) >= 1){
        foreach($allUsers as $user){
            echo "<div class='col-sm-6'>
            <div class='card'>
            <div class='card-body'><h3>";
            echo $user->first_name.' '.$user->last_name;//show name
            echo "</h3><br>";
            echo $user->email;
            echo "<br>User Signed in: ";
            $session =  $this->Identity->get('email');
            echo "$session";
            //ADMIN ONLY 
            if($session == "admin@gmail.com"){
                $viewTradesLink = $this->Url->build("/investments/index/".$user->id);
                echo '<br><a href="'.$viewTradesLink.'" class="btn btn-danger">View Trades</a>';
            }
            echo "</div></div></div><br>";
        }
        echo "</div>";
    }
