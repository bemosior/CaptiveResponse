<?php
echo $this->Form->create('Answer');
echo $this->Form->input('html', array('rows' => '5'));
echo $this->Form->input('explanation', array('rows' => '5'));
echo $this->Form->input('weight');
echo $this->Form->input('correct');
echo $this->Form->input('question_id');
echo $this->Form->end('Save Answer');
?>