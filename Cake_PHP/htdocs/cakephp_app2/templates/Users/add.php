<h2>Add a new User</h2>

<?php
//reference: https://book.cakephp.org/4/en/views/helpers/form.html
//reference: lesson 13 2020, 6.2A  

    //creating the form tag , <form> 
    echo $this->Form->create();
    echo "<br><br>";
    //Creating Form Controls
    echo $this->Form->control('first_name', ['required' => true,
                                            'class' => 'form_control']);
    echo "<br>";
    echo $this->Form->control('last_name', ['required' => true,
                                            'class' => 'form_control']);
    echo "<br>";
    echo $this->Form->control('email', ['required' => true,
                                        'class' => 'form_control']);
    //Creating Buttons and Submit Elements
    echo $this->Form->submit("Add user",['class' => "btn btn-primary mt-3 btn-block"]);
    echo $this->Form->end();