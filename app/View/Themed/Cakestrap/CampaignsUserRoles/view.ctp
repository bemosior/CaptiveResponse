<?php
echo $this->Form->create('CampaignsUserRole');
echo $this->Form->input('campaign_id', array('disabled' => true));
echo $this->Form->input('user_role_id', array('disabled' => true));
echo $this->Form->input('grace_period', array('disabled' => true));
echo $this->Form->input('reminder_interval', array('disabled' => true));
echo $this->Form->end(array('hidden' => true));
?>