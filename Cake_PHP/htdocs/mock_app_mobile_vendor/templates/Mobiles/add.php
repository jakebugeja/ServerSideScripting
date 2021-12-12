<p>add.php - MobilesController</p>
<?php
echo $this->Form->create();

echo $this->Form->control('model', ['required' => true],
                                    ['class' => 'form-control mb-3']);

//brand
echo $this->Form->select('brand_id', ['options' => $selectBrand]);

echo $this->Form->control('price', ['required' => true],
                                   ['class' => 'form-control mb-3'],
                                   ['type' => 'number']);

echo $this->Form->control('sold_qty', ['required' => false],
                                   ['class' => 'form-control mb-3'],
                                   ['type' => 'number']);

echo $this->Form->control('stock_qty', ['required' => false],
                                   ['class' => 'form-control mb-3'],
                                   ['type' => 'number']);

echo $this->Form->submit('Subimt');




