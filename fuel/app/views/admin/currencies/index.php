<p>
	<?php echo Html::anchor('admin/currencies/create', 'New Currency', array('class' => 'btn btn-success')); ?>

</p>
<?php if ($currencies): ?>
<?php echo $pagination->render(); ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Country</th>
			<th>Name</th>
			<th>Symbol</th>
			<th>Exchange rate</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($currencies as $item): ?>		<tr>

                        <td><?php echo $item->country; ?> <?php if ($item->is_default == 1): ?> - <em>Default currency</em><?php endif; ?></td>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->symbol; ?></td>
			<td><?php echo $item->exchange_rate; ?></td>
			<td nowrap>
				<?php echo Html::anchor('admin/currencies/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/currencies/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/currencies/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Currencies.</p>

<?php endif; ?>
<p></p>
