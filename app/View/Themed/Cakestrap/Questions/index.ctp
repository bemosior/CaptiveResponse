<table class="table">
    <tr>
        <th>Id</th>
        <th>Campaign</th>
        <th>HTML</th>
        <th></th>
    </tr>

    <!-- Here is where we loop through our $questions array, printing out question info -->

    <?php foreach ($questions as $question): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($question['Question']['id'],
                array('controller' => 'questions', 'action' => 'view', $question['Question']['id'])); ?>
        </td>
        <td><?php echo $question['Question']['campaign_id']; ?></td>

        <td><?php echo $question['Question']['html']; ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete', 
                array('action' => 'delete', $question['Question']['id']), null,  
                'Are you sure you want to delete question ID ' . $question['Question']['id'] . '?'); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($question); ?>
</table>