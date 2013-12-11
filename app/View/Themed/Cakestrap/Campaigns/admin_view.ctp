<?php
echo $this->Form->create('Campaign');
echo $this->Form->input('title', array('disabled' => true));
echo $this->Form->input('html', array('rows' => '5', 'disabled' => true));
echo $this->Form->input('start_time', array('disabled' => true));
echo $this->Form->input('stop_time', array('disabled' => true));
echo $this->Form->input('pass_percent', array('disabled' => true));
echo $this->Form->input('failure_threshold', array('disabled' => true));
echo $this->Form->input('questions_weighted', array('disabled' => true));
echo $this->Form->input('active', array('disabled' => true));
echo $this->Form->end(array('hidden' => true));
?>