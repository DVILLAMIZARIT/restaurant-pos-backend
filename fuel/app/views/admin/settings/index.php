<p>
    <?php echo Html::anchor('admin/settings/create', 'New Setting', array('class' => 'btn btn-success')); ?>
</p>

<?php if ($settings): ?>
<?php echo $pagination->render(); ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Setting key</th>
			<th>Setting title</th>
			<th>Setting value</th>
			<th>Setting data type</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($settings as $item): ?>		<tr>

			<td><?php echo $item->setting_key; ?></td>
			<td><?php echo $item->setting_title; ?></td>
			<td><?php echo $item->setting_value; ?></td>
			<td><?php echo $item->get_data_type()->name; ?></td>
			<td>
				<?php echo Html::anchor('admin/settings/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/settings/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/settings/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Settings.</p>

<?php endif; ?>

