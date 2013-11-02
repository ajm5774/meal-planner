<?php
echo $this->Session->flash();
$table = $this->Html->div('grid_24 table', $this->element('InventoryTable'));
echo $this->Html->div('prefix_4 suffix_4', $table);