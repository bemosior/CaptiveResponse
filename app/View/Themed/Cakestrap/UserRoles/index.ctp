<table class="table">
    <tr>
        <th>Id</th>
        <th>Local Name</th>
        <th>External Name</th>
        <th></th>
    </tr>

    <!-- Here is where we loop through our $userRoles array, printing out userRole info -->

    <?php foreach ($user_roles as $user_role): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($user_role['UserRole']['id'],
                array('controller' => 'userRoles', 'action' => 'view', $user_role['UserRole']['id'])); ?>
        </td>
        <td><?php echo $user_role['UserRole']['local_name']; ?></td>

        <td><?php echo $user_role['UserRole']['external_name']; ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete', 
                array('action' => 'delete', $user_role['UserRole']['id']), null,  
                'Are you sure you want to delete userRole ID ' . $user_role['UserRole']['id'] . '?'); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user_role); ?>
</table>