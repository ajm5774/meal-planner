<?php
echo $this->html->div('', $this->Session->flash(), array('id' => 'flash'));
$table = $this->element('ScheduleTable');
echo '<center>' . $this->html->div('', $table) . '<center>';