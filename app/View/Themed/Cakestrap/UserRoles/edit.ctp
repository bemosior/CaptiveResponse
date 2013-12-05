<?php
echo $this->Form->create('UserRole');
echo $this->Form->input('local_name');
echo $this->Form->input('external_name');
echo $this->Form->end('Save User Role');
?>