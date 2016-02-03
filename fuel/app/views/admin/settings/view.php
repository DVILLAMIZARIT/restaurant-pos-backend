<div class="col-md-8">
    <h4 align="center"><?php echo $setting->setting_title; ?></h4>

    <p>
            <strong>Setting key:</strong>
            <span class="pull-right"><?php echo $setting->setting_key; ?></span>
    </p>
    <p>
            <strong>Setting title:</strong>
            <span class="pull-right"><?php echo $setting->setting_title; ?></span>
    </p>
    <p>
            <strong>Setting value:</strong>
            <span class="pull-right"><?php echo $setting->setting_value; ?></span>
    </p>
    <p>
            <strong>Setting data type:</strong>
            <span class="pull-right"><?php echo $setting->get_data_type()->name; ?></span>
    </p>

    <p align="center">
        <?php echo Html::anchor('admin/settings', '&laquo; Settings', array('class' => 'btn btn-default')); ?> 
        <?php echo Html::anchor('admin/settings/edit/'.$setting->id, 'Edit', array('class' => 'btn btn-primary')); ?> 
    </p>
</div>
<div class="col-md-4"></div>