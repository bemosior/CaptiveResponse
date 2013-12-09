<?php
echo $this->Form->create('CampaignsUserRole');
echo $this->Form->input('campaign_id');
echo $this->Form->input('user_role_id');
echo $this->Form->input('grace_period');
echo $this->Form->input('reminder_interval');
echo $this->Form->end('Save Campaign User Role');
?>