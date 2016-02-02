<h2>Viewing #<?php echo $currency->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $currency->name; ?></p>
<p>
	<strong>Symbol:</strong>
	<?php echo $currency->symbol; ?></p>
<p>
	<strong>Country:</strong>
	<?php echo $currency->country; ?></p>
<p>
	<strong>Is default:</strong>
	<?php echo $currency->is_default; ?></p>
<p>
	<strong>Exchange rate:</strong>
	<?php echo $currency->exchange_rate; ?></p>

<p>
	<?php echo Html::anchor('admin/currencies', 'Back', array('class' => 'btn btn-default')); ?>
	<?php echo Html::anchor('admin/currencies/edit/'.$currency->id, 'Edit', array('class' => 'btn btn-primary')); ?> 
</p>