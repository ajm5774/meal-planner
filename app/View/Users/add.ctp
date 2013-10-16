<?php
$content = $this->Form->create();
$content .= $this->Form->input('username');
$content .= $this->Form->input('email');
$content .= $this->Form->input('password');
$content .= $this->Form->input('confirmPassword');
$content .= $this->Form->end("Create Account", array('type' => 'password'));

echo $this->Widget->center($content);