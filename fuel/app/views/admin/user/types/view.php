<div class="col-md-8">
    <h4><?php echo $user_type->id; ?></h4>

    <p>
            <strong>Name:</strong>
            <?php echo $user_type->name; ?>
    </p>
    <p>
            <strong>Group:</strong>
            <?php echo $user_type->group; ?>
    </p>
    
    <p>
        <?php echo Html::anchor('admin/user/types', '&laquo; User Types', array('class' => 'btn btn-default')); ?> 
        <?php echo Html::anchor('admin/user/types/edit/'.$user_type->id, 'Edit', array('class' => 'btn btn-primary')); ?> 
    </p>
</div>
<div class="col-md-4"></div>