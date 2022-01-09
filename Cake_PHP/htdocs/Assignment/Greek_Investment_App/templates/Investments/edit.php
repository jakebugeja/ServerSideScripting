<h2>Investments - Edit</h2>
<p>Fill in this form to edit a investment</p>

<div class="row">
    <div class="col-6 offset-3">

        <?php
            //https://book.cakephp.org/4/en/views/helpers/form.html
            //Form Helper

            echo $this->Form->create($investmentToEdit);//being recieved from the controller
                                    //this will populate the form with investment of which id == to id                                                    
            echo $this->Form->control("share", [
                                                        'placeholder' => 'Enter your share', 
                                                        'label' => 'Sale', 
                                                        'class' => 'form-control mb-3'
                                                    ]);
            echo $this->Form->control("bought_at", [
                                                        'placeholder' => 'Enter your price', 
                                                        'label' => 'Bought At', 
                                                        'class' => 'form-control mb-3'
                                                    ]);
            echo $this->Form->control("note", [
                                                        'placeholder' => 'Enter your note', 
                                                        'label' => 'Note', 
                                                        'class' => 'form-control mb-3'
                                                    ]);
            echo $this->Form->control('privacy', ['type' => 'checkbox']); 

            echo $this->Form->submit("Edit Investment", ['class' => 'btn btn-primary mt-3']);

            echo $this->Form->end();

        ?>

    </div>
</div>