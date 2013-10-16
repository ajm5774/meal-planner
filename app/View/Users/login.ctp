<?php
echo $this->Form->create();
echo $this->Widget->center($this->Form->input('username'));
echo $this->Widget->center($this->Form->input('password'));
echo $this->Widget->center($this->Form->end('Login'));