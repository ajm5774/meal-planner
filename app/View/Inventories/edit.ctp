<?php
echo $this->Session->flash();
$table = $this->Html->div('grid_12 table', $this->element('InventoryTable'));
echo $this->Html->div('prefix_2 suffix_2', $table);