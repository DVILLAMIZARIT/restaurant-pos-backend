<div class="col-md-6">
    <?php echo render('admin/user/types/_form'); ?>
    <p>
    <p>
        <?php echo Html::anchor('admin/user/types', '&laquo; User Types', array('class' => 'btn btn-default')); ?> 
        <?php echo isset($user_type) ? Fuel\Core\Html::anchor('admin/user/types/view/'.$user_type->id, 'View', array('class' => 'btn btn-warning')) : ''; ?> 
        <?php echo Html::anchor('admin/user/types/edit/'.$user_type->id, 'Edit', array('class' => 'btn btn-primary')); ?> 
    </p>
</div>
<div class="col-md-6"></div>
