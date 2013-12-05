<?php
echo $this->Form->create('Answer');
echo $this->Form->input('html', array('rows' => '5', 'disabled' => true));
echo $this->Form->input('explanation', array('rows' => '5', 'disabled' => true));
echo $this->Form->input('weight', array('disabled' => true));
echo $this->Form->input('correct', array('disabled' => true));
echo $this->Form->input('question_id', array('disabled' => true));
echo $this->Form->end(array('hidden' => true));
?>