<div class="col-md-8">
<h4 align="center"><?php echo $inventory_unit->name; ?></h4>

<p>
	<strong>Name:</strong>
        <span class="pull-right"><?php echo $inventory_unit->name; ?></span>
</p>

<p align="center">
    <?php echo Html::anchor('admin/inventory/units', '&laquo; Inventory Units', array('class' => 'btn btn-default')); ?>
    <?php echo Html::anchor('admin/inventory/units/edit/'.$inventory_unit->id, 'Edit', array('class' => 'btn btn-primary')); ?> 
</p>

</div>
<div class="col-md-4"></div>