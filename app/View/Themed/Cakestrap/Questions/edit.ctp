<?php
echo $this->Form->create('Question');
echo $this->Form->input('html', array('rows' => '5'));
echo $this->Form->input('answers_weighted');
echo $this->Form->input('weight');
echo $this->Form->input('multiple_answers');
echo $this->Form->input('campaign_id');
echo $this->Form->end('Save Campaign');
?>