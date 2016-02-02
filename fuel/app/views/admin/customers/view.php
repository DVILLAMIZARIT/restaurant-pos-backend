<div class="col-md-8">
	<h4 align="center"><?php echo $customer->description; ?></h4>

	<p>
		<strong>Description:</strong>
		<span class="pull-right"><?php echo $customer->description; ?></span>
	</p>
	<p>
		<strong>Contact person:</strong>
		<span class="pull-right"><?php echo $customer->contact_person; ?></span>
	</p>
	<p>
		<strong>Phone:</strong>
		<span class="pull-right"><?php echo Num::format_phone($customer->phone); ?></span>
	</p>
	<p>
		<strong>Email:</strong>
		<span class="pull-right"><?php echo $customer->email; ?></span>
	</p>

	<p align="center">
		<?php echo Html::anchor('admin/customers', '&laquo; Customers', array('class' => 'btn btn-default')); ?> 
		<?php echo Html::anchor('admin/customers/edit/'.$customer->id, 'Edit', array('class' => 'btn btn-primary')); ?>
	</p> 
</div>
<div class="col-md-4"></div>