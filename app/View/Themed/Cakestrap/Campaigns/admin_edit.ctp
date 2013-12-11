<?php
echo $this->Form->create('Campaign');
echo $this->Form->input('title');
echo $this->Form->input('html', array('rows' => '5'));
echo $this->Form->input('start_time');
echo $this->Form->input('stop_time');
echo $this->Form->input('pass_percent');
echo $this->Form->input('failure_threshold');
echo $this->Form->input('questions_weighted');
echo $this->Form->input('active');
echo $this->Form->end('Save Campaign');
?>