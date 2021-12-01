<h2>Users - Add</h2>
<p>Fill in this form to add a user</p>

<div class="row">
    <div class="col-6 offset-3">

        <?php
            //https://book.cakephp.org/4/en/views/helpers/form.html
            //Form Helper

            echo $this->Form->create();
            echo $this->Form->control("first_name", [
                                                        'placeholder' => 'Enter your name', 
                                                        'label' => false, 
                                                        'class' => 'form-control mb-3'
                                                    ]);

            echo $this->Form->control("last_name",  ['placeholder' => 'Enter your surname', 'label' => false, 'class' => 'form-control']);
            echo $this->Form->submit("Add User", ['class' => 'btn btn-primary mt-3']);
            echo $this->Form->end();

        ?>

    </div>
</div>