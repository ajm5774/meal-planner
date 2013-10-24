<?php
echo $this->Session->flash();
echo $this->element('InventoryTable', array('options' => array('class' => 'table', 'style' => 'width: 500px;')));