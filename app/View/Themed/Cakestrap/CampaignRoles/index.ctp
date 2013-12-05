<table class="table">
    <tr>
        <th>Id</th>
        <th>Campaign</th>
        <th>User Role</th>
        <th>Grace Period</th>
        <th></th>
    </tr>

    <!-- Here is where we loop through our $campaignRoles array, printing out campaignRole info -->

    <?php foreach ($campaign_roles as $campaign_role): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($campaign_role['CampaignRole']['id'],
                array('controller' => 'campaignRoles', 'action' => 'view', $campaign_role['CampaignRole']['id'])); ?>
        </td>
        <td><?php echo $campaign_role['CampaignRole']['campaign_id']; ?></td>

        <td><?php echo $campaign_role['CampaignRole']['user_role_id']; ?></td>
        <td><?php echo $campaign_role['CampaignRole']['grace_period']; ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete', 
                array('action' => 'delete', $campaign_role['CampaignRole']['id']), null,  
                'Are you sure you want to delete campaignRole ID ' . $campaign_role['CampaignRole']['id'] . '?'); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($campaign_role); ?>
</table>