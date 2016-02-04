<p>
    <?php echo Html::anchor('admin/user/types/create', 'New Employee Type', array('class' => 'btn btn-success')); ?>
</p>
<?php if ($user_types): ?>
<?php echo $pagination->render(); ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
                        <th style="width: 150px;"></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($user_types as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td nowrap>
                            <?php echo Html::anchor('admin/user/types/view/'.$item->id, 'View'); ?> | 
                            <?php echo Html::anchor('admin/user/types/edit/'.$item->id, 'Edit'); ?> | 
                            <?php echo Html::anchor('admin/user/types/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
			</td>
		</tr>
<?php endforeach; ?>	
        </tbody>
</table>

<?php else: ?>
<p>No User Types.</p>

<?php endif; ?>
<p></p>
