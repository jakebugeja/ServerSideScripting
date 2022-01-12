<h1>Share.php - Investments Controller</h1>


<div class="row">
    <div class="col-6 offset-3">

    <?php
    echo $this->Form->create($investmentToShare);//being recieved from the controller
        //this will populate the form with investment of which is == to id     

    //select option
    echo $this->Form->select('user_id', ['options' => $selectUser]);

    echo $this->Form->select('ticker_id', ['options' => $selectTicker,
                                            'disabled' => true]);

    echo $this->Form->control('share', ['required' => true,
                                        'disabled' => true,
                                        'class' => 'form-control mb-3']);

    echo $this->Form->control('bought_at', ['required' => true,
                                        'disabled' => true,
                                        'class' => 'form-control mb-3']);     
                                        
    echo $this->Form->control('note', ['required' => false,
                                        'disabled' => true,
                                        'class' => 'form-control mb-3']);

    echo $this->Form->control('privacy', ['type' => 'checkbox','disabled' => true,]);                         
                            //i.e. 0 for false, 1-255 (preferably 1) for true.
                                        
    echo $this->Form->submit('Share', ['class' => 'btn btn-primary mt-3']);

    echo $this->Form->end();
    ?>

    </div>
</div>