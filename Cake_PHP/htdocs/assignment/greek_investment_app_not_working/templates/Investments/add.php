<h1>Add.php - Investments Controller</h1>
<?php
echo $this->Form->create();

//select option
echo $this->Form->select('ticker_id', ['options' => $selectTicker]);

echo $this->Form->control('share', ['required' => true],
                                    ['class' => 'form-control mb-3']);

echo $this->Form->control('bought_at', ['required' => true],
                                    ['class' => 'form-control mb-3']);     
                                    
echo $this->Form->control('note', ['required' => false],
                                    ['class' => 'form-control mb-3']);

echo $this->Form->control('privacy', ['type' => 'checkbox']);                         
                        //i.e. 0 for false, 1-255 (preferably 1) for true.
                                    
echo $this->Form->submit('Subimt');