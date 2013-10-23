<?php
echo $this->element('ApplianceTable', array('options' => array('class' => 'table', 'style' => 'width: 500px;')));

echo $this->Form->input('User.email');

echo $this->html->div('', '', array('id' => 'slider'));

?>

<script>
$('#slider').slider();
</script>