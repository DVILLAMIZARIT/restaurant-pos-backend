<div class="col-md-8">
<h3 align="center"><?php echo $currency->name; ?></h3>

<p>
	<strong>Name:</strong>
        <span class="pull-right"><?php echo $currency->name; ?></span>
</p>
<p>
	<strong>Symbol:</strong>
	<span class="pull-right"><?php echo $currency->symbol; ?></span>
</p>
<p>
	<strong>Country:</strong>
	<span class="pull-right"><?php echo $currency->country; ?></span>
</p>
<p>
	<strong>Is default:</strong>
	<span class="pull-right"><?php echo $currency->is_default; ?></span>
</p>
<p>
	<strong>Exchange rate:</strong>
	<span class="pull-right"><?php echo $currency->exchange_rate; ?></span>
</p>

<p align="center">
	<?php echo Html::anchor('admin/currencies', '&laquo; Currencies', array('class' => 'btn btn-default')); ?>
	<?php echo Html::anchor('admin/currencies/edit/'.$currency->id, 'Edit', array('class' => 'btn btn-primary')); ?> 
</p>
</div>
<div class="col-md-4"></div>