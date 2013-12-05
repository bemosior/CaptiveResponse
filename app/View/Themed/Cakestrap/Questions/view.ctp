<?php
echo $this->Form->create('Question');
echo $this->Form->input('html', array('rows' => '5', 'disabled' => true));
echo $this->Form->input('answers_weighted', array('disabled' => true));
echo $this->Form->input('weight', array('disabled' => true));
echo $this->Form->input('multiple_answers', array('disabled' => true));
echo $this->Form->input('campaign_id', array('disabled' => true));
echo $this->Form->end(array('hidden' => true));
?>