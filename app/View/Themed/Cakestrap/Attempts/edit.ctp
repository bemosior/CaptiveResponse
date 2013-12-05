<?php
echo $this->Form->create('Attempt');
echo $this->Form->input('user_identifier');
echo $this->Form->input('campaign_id');
echo $this->Form->input('start_time');
echo $this->Form->input('last_skip');
echo $this->Form->input('score');
echo $this->Form->input('attempts');
echo $this->Form->end('Save Attempt');
?>