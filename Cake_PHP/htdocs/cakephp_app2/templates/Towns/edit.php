<h2>Edit Town</h2>
<?php
    echo $this->Form->create($townToEdit);//being recieved from the controller
                    //this will populate the form with town of which is == to id  

    echo $this->Form->control('town_name', ['required' => false,
                                            'class' => 'form-control mb-3']);

    echo $this->Form->button('Add',['class' => "btn btn-primary mt-3 btn-block"]);