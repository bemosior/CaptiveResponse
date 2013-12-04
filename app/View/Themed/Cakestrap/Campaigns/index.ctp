<table class="table">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Active</th>
    </tr>

    <!-- Here is where we loop through our $campaigns array, printing out campaign info -->

    <?php foreach ($campaigns as $campaign): ?>
    <tr>
        <td><?php echo $campaign['Campaign']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($campaign['Campaign']['title'],
				array('controller' => 'campaigns', 'action' => 'view', $campaign['Campaign']['id'])); ?>
        </td>
        <td><?php echo $campaign['Campaign']['active']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($campaign); ?>
</table>