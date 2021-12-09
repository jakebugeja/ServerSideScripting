<h2>Add a new Town</h2>

<?php
    //reference: https://book.cakephp.org/4/en/views/helpers/form.html
    echo $this->Form->create();

    echo $this->Form->control('town_name', ['required' => false,
                                            'class' => 'form-control mb-3']);

    echo $this->Form->button('Add',['class' => "btn btn-primary mt-3 btn-block"]);





