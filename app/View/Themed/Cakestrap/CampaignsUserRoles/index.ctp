<table class="table">
    <tr>
        <th>Id</th>
        <th>Campaign</th>
        <th>User Role</th>
        <th>Grace Period</th>
        <th>Reminder Interval</th>
        <th></th>
    </tr>

    <!-- Here is where we loop through our $campaignRoles array, printing out campaignRole info -->

    <?php foreach ($campaigns_user_roles as $campaigns_user_role): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($campaigns_user_role['CampaignsUserRole']['id'],
                array('controller' => 'campaignsUserRoles', 'action' => 'view', $campaigns_user_role['CampaignsUserRole']['id'])); ?>
        </td>
        <td><?php echo $campaigns_user_role['CampaignsUserRole']['campaign_id']; ?></td>

        <td><?php echo $campaigns_user_role['CampaignsUserRole']['user_role_id']; ?></td>
        <td><?php echo $campaigns_user_role['CampaignsUserRole']['grace_period']; ?></td>
        <td><?php echo $campaigns_user_role['CampaignsUserRole']['reminder_interval']; ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete', 
                array('action' => 'delete', $campaigns_user_role['CampaignsUserRole']['id']), null,  
                'Are you sure you want to delete campaignRole ID ' . $campaigns_user_role['CampaignsUserRole']['id'] . '?'); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($campaigns_user_role); ?>
</table>