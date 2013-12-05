<table class="table">
    <tr>
        <th>Id</th>
        <th>User ID</th>
        <th>Campaign</th>
        <th>Start Time</th>
        <th>Last Skipped</th>
        <th>Score</th>
        <th>Attempts</th>
        <th></th>
    </tr>

    <!-- Here is where we loop through our $attempts array, printing out attempt info -->

    <?php foreach ($attempts as $attempt): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($attempt['Attempt']['id'],
                array('controller' => 'attempts', 'action' => 'view', $attempt['Attempt']['id'])); ?>
        </td>

        <td><?php echo $attempt['Attempt']['user_identifier']; ?></td>
        <td><?php echo $attempt['Attempt']['campaign_id']; ?></td>
        <td><?php echo $attempt['Attempt']['start_time']; ?></td>
        <td><?php echo $attempt['Attempt']['last_skip']; ?></td>
        <td><?php echo $attempt['Attempt']['score']; ?></td>
        <td><?php echo $attempt['Attempt']['attempts']; ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete', 
                array('action' => 'delete', $attempt['Attempt']['id']), null,  
                'Are you sure you want to delete ' . $attempt['Attempt']['id'] . '?'); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($attempt); ?>
</table>