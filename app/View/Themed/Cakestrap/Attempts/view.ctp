<?php
echo $this->Form->create('Attempt');
echo $this->Form->input('user_identifier', array('disabled' => true));
echo $this->Form->input('campaign_id', array('disabled' => true));
echo $this->Form->input('start_time', array('disabled' => true));
echo $this->Form->input('last_skip', array('disabled' => true));
echo $this->Form->input('score', array('disabled' => true));
echo $this->Form->input('attempts', array('disabled' => true));
echo $this->Form->end(array('hidden' => true));
?>