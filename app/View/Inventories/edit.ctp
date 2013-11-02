<?php
echo $this->Session->flash();
$table = $this->Html->div('grid_16 table', $this->element('InventoryTable'));
echo $this->Html->div('prefix_4 suffix_4', $table);