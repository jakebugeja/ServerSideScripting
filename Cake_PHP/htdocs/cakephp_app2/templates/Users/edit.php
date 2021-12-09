<h2>Users - Edit</h2>
<p>Fill in this form to edit a user</p>

<div class="row">
    <div class="col-6 offset-3">

        <?php
            //https://book.cakephp.org/4/en/views/helpers/form.html
            //Form Helper

            echo $this->Form->create($userToEdit);//being recieved from the controller
                                    //this will populate the form with user of which is == to id                                                    
            echo $this->Form->control("first_name", [
                                                        'placeholder' => 'Enter your name', 
                                                        'label' => false, 
                                                        'class' => 'form-control mb-3'
                                                    ]);

            echo $this->Form->control("last_name",  ['placeholder' => 'Enter your surname', 'label' => false, 'class' => 'form-control']);
            echo $this->Form->control('town_id', ['options' => $allTowns,//options: the names of the 
                                                            //select items in the view
                                        'required' => false,
                                        'class' => 'form-control mb-3']);
            echo $this->Form->submit("Edit User", ['class' => 'btn btn-primary mt-3']);

            echo $this->Form->end();

        ?>

    </div>
</div>