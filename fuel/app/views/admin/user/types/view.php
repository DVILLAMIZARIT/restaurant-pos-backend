<div class="col-md-8">
    <h3 align="center"><?php echo $user_type->name; ?></h3>

    <p>
            <strong>Name:</strong>
            <span class="pull-right"><?php echo $user_type->name; ?></span>
    </p>
    <p>
            <strong>System Login Rights:</strong>
            <span class="pull-right"><?php echo $user_type->group; ?></span>
    </p>
    
    <p align="center">
        <?php echo Html::anchor('admin/user/types', '&laquo; User Types', array('class' => 'btn btn-default')); ?> 
        <?php echo Html::anchor('admin/user/types/edit/'.$user_type->id, 'Edit', array('class' => 'btn btn-primary')); ?> 
    </p>
</div>
<div class="col-md-4"></div>