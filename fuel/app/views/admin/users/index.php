
<p>
	<?php echo Html::anchor('admin/users/create', 'New User', array('class' => 'btn btn-success')); ?>

</p>
<?php if ($users): ?>
<?php echo $pagination->render(); ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Last login</th>
			<th>Group</th>
			<th>User type id</th>
			<th>Phone</th>
                        <th style="width: 150px;"></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $item): ?>		<tr>

			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->username; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo Date::forge($item->last_login); ?></td>
			<td><?php echo $item->group; ?></td>
			<td><?php echo $item->get_user_type()->name; ?></td>
                        <td><?php echo Fuel\Core\Num::format_phone($item->phone); ?></td>
			<td nowrap>
				<?php echo Html::anchor('admin/users/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/users/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/users/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?>
<p></p>
