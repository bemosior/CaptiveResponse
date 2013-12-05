<?php
echo $this->Form->create('UserRole');
echo $this->Form->input('local_name', array('disabled' => true));
echo $this->Form->input('external_name', array('disabled' => true));
echo $this->Form->end(array('hidden' => true));
?>