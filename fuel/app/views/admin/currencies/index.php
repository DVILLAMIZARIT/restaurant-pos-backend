<?php if ($currencies): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Symbol</th>
			<th>Country</th>
			<th>Is default</th>
			<th>Exchange rate</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($currencies as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->symbol; ?></td>
			<td><?php echo $item->country; ?></td>
			<td><?php echo $item->is_default; ?></td>
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

<?php endif; ?><p>
	<?php echo Html::anchor('admin/currencies/create', 'Add new Currency', array('class' => 'btn btn-success')); ?>

</p>
