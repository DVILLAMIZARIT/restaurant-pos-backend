<div class="col-md-8">
    <h3 align="center"><?php echo $inventory->description; ?></h3>
   
    <p>
            <strong>Barcode:</strong>
            <span class="pull-right"><?php echo $inventory->barcode; ?></span>
    </p>
    <p>
            <strong>Short code:</strong>
            <span class="pull-right"><?php echo $inventory->short_code; ?></span>
    </p>
    <p>
            <strong>Measure in:</strong>
            <span class="pull-right"><?php echo $inventory->get_inventory_unit()->name; ?></span>
    </p>
    <p>
            <strong>Warning level:</strong>
            <span class="pull-right"><?php echo $inventory->warning_level; ?></span>
    </p>

    <p align="center">
        <?php echo Html::anchor('admin/inventory', '&laquo; Inventories', array('class' => 'btn btn-default')); ?> 
        <?php echo Html::anchor('admin/inventory/edit/'.$inventory->id, 'Edit', array('class' => 'btn btn-primary')); ?>
    </p>
</div>
<div class="col-md-4"></div>