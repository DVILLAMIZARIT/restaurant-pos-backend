<div class="col-md-8">
    <h4 align="center"><?php echo $supplier->description; ?></h4>

    <p>
            <strong>Description:</strong>
            <span class="pull-right"><?php echo $supplier->description; ?></span>
    </p>
    <p>
            <strong>Contact person:</strong>
            <span class="pull-right"><?php echo $supplier->contact_person; ?></span>
    </p>
    <p>
            <strong>Phone:</strong>
            <span class="pull-right"><?php echo Fuel\Core\Num::format_phone($supplier->phone); ?></span>
    </p>
    <p>
            <strong>Email:</strong>
            <span class="pull-right"><?php echo $supplier->email; ?></span>
    </p>

    <p align="center">
        <?php echo Html::anchor('admin/suppliers', '&laquo; Suppliers', array('class' => 'btn btn-default')); ?> 
        <?php echo Html::anchor('admin/suppliers/edit/'.$supplier->id, 'Edit', array('class' => 'btn btn-primary')); ?> 
    </p>
</div>
<div class="col-md-4"></div>