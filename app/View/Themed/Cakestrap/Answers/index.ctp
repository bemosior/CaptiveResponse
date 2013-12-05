<table class="table">
    <tr>
        <th>Id</th>
        <th>Question</th>
        <th>HTML</th>
        <th></th>
    </tr>

    <!-- Here is where we loop through our $answers array, printing out answer info -->

    <?php foreach ($answers as $answer): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($answer['Answer']['id'],
                array('controller' => 'answers', 'action' => 'view', $answer['Answer']['id'])); ?>
        </td>
        <td><?php echo $answer['Answer']['question_id']; ?></td>

        <td><?php echo $answer['Answer']['html']; ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete', 
                array('action' => 'delete', $answer['Answer']['id']), null,  
                'Are you sure you want to delete answer ID ' . $answer['Answer']['id'] . '?'); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($answer); ?>
</table>